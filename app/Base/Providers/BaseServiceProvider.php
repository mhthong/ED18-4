<?php

namespace Crysys\Base\Providers;

use Crysys\Base\Exceptions\Handler;
use Crysys\Base\Http\Middleware\DisableInDemoModeMiddleware;
use Crysys\Base\Http\Middleware\HttpsProtocolMiddleware;
use Crysys\Base\Http\Middleware\LocaleMiddleware;
use Crysys\Base\Models\MetaBox as MetaBoxModel;
use Crysys\Base\Repositories\Caches\MetaBoxCacheDecorator;
use Crysys\Base\Repositories\Eloquent\MetaBoxRepository;
use Crysys\Base\Repositories\Interfaces\MetaBoxInterface;
use Crysys\Base\Supports\BreadcrumbsManager;
use Crysys\Base\Supports\CustomResourceRegistrar;
use Crysys\Base\Supports\Helper;
use Crysys\Base\Traits\LoadAndPublishDataTrait;
use Crysys\Setting\Providers\SettingServiceProvider;
use Crysys\Setting\Supports\SettingStore;
use Event;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\ResourceRegistrar;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use MetaBox;

class BaseServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->bind(ResourceRegistrar::class, function ($app) {
            return new CustomResourceRegistrar($app['router']);
        });

        Helper::autoload(__DIR__ . '/../../helpers');

        $this->setNamespace('core/base')
            ->loadAndPublishConfigurations(['general']);

        $this->app->register(SettingServiceProvider::class);

        $config = $this->app->make('config');
        $setting = $this->app->make(SettingStore::class);

        $config->set([
            'app.timezone'                     => $setting->get('time_zone', $config->get('app.timezone')),
            'ziggy.blacklist'                  => ['debugbar.*'],
            'session.cookie'                   => 'crysys_session',
            'filesystems.default'              => $setting->get('media_driver', 'public'),
            'filesystems.disks.s3.key'         => $setting
                ->get('media_aws_access_key_id', $config->get('filesystems.disks.s3.key')),
            'filesystems.disks.s3.secret'      => $setting
                ->get('media_aws_secret_key', $config->get('filesystems.disks.s3.secret')),
            'filesystems.disks.s3.region'      => $setting
                ->get('media_aws_default_region', $config->get('filesystems.disks.s3.region')),
            'filesystems.disks.s3.bucket'      => $setting
                ->get('media_aws_bucket', $config->get('filesystems.disks.s3.bucket')),
            'filesystems.disks.s3.url'         => $setting
                ->get('media_aws_url', $config->get('filesystems.disks.s3.url')),
            'filesystems.disks.do_spaces'      => [
                'driver'     => 's3',
                'visibility' => 'public',
                'key'        => $setting->get('media_do_spaces_access_key_id'),
                'secret'     => $setting->get('media_do_spaces_secret_key'),
                'region'     => $setting->get('media_do_spaces_default_region'),
                'bucket'     => $setting->get('media_do_spaces_bucket'),
                'endpoint'   => $setting->get('media_do_spaces_endpoint'),
            ],
            'app.debug_blacklist'              => [
                '_ENV'    => [
                    'APP_KEY',
                    'ADMIN_DIR',
                    'DB_DATABASE',
                    'DB_USERNAME',
                    'DB_PASSWORD',
                    'REDIS_PASSWORD',
                    'MAIL_PASSWORD',
                    'PUSHER_APP_KEY',
                    'PUSHER_APP_SECRET',
                ],
                '_SERVER' => [
                    'APP_KEY',
                    'ADMIN_DIR',
                    'DB_DATABASE',
                    'DB_USERNAME',
                    'DB_PASSWORD',
                    'REDIS_PASSWORD',
                    'MAIL_PASSWORD',
                    'PUSHER_APP_KEY',
                    'PUSHER_APP_SECRET',
                ],
                '_POST'   => [
                    'password',
                ],
            ],
            'datatables-buttons.pdf_generator' => 'excel',
        ]);

        date_default_timezone_set($config->get('app.timezone', 'UTC'));

        $this->app->singleton(ExceptionHandler::class, Handler::class);

        $this->app->singleton(BreadcrumbsManager::class, BreadcrumbsManager::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];

        $router->pushMiddlewareToGroup('web', LocaleMiddleware::class);
        $router->pushMiddlewareToGroup('web', HttpsProtocolMiddleware::class);
        $router->aliasMiddleware('preventDemo', DisableInDemoModeMiddleware::class);

        $this->app->bind(MetaBoxInterface::class, function () {
            return new MetaBoxCacheDecorator(new MetaBoxRepository(new MetaBoxModel));
        });
    }

    public function boot()
    {
        $this->setNamespace('core/base')
            ->loadAndPublishConfigurations(['permissions', 'assets'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->loadMigrations()
            ->publishAssets();

        $this->app->booted(function () {
            do_action(BASE_ACTION_INIT);
            add_action(BASE_ACTION_META_BOXES, [MetaBox::class, 'doMetaBoxes'], 8, 2);

            $config = $this->app->make('config');
            $config->set([
                'app.locale'                                         => $config->get('core.base.general.locale',
                    $config->get('app.locale')),
                'purifier.settings.default.AutoFormat.AutoParagraph' => false,
                'purifier.settings.default.AutoFormat.RemoveEmpty'   => false,
            ]);
        });

        Event::listen(RouteMatched::class, function () {
            $this->registerDefaultMenus();
        });
    }

    /**
     * Add default dashboard menu for core
     */
    public function registerDefaultMenus()
    {
        dashboard_menu()
            ->registerItem([
                'id'          => 'cms-core-platform-administration',
                'priority'    => 999,
                'parent_id'   => null,
                'name'        => 'core/base::layouts.platform_admin',
                'icon'        => 'fa fa-user-shield',
                'url'         => null,
                'permissions' => ['users.index'],
            ])
            ->registerItem([
                'id'          => 'cms-core-system-information',
                'priority'    => 5,
                'parent_id'   => 'cms-core-platform-administration',
                'name'        => 'core/base::system.info.title',
                'icon'        => null,
                'url'         => route('system.info'),
                'permissions' => [ACL_ROLE_SUPER_USER],
            ])
            ->registerItem([
                'id'          => 'cms-core-system-cache',
                'priority'    => 6,
                'parent_id'   => 'cms-core-platform-administration',
                'name'        => 'core/base::cache.cache_management',
                'icon'        => null,
                'url'         => route('system.cache'),
                'permissions' => [ACL_ROLE_SUPER_USER],
            ]);
    }

    /**
     * @return array|string[]
     */
    public function provides(): array
    {
        return [BreadcrumbsManager::class];
    }
}
