<?php

namespace Crysys\Base\Providers;

use Crysys\Base\Events\BeforeEditContentEvent;
use Crysys\Base\Events\CreatedContentEvent;
use Crysys\Base\Events\DeletedContentEvent;
use Crysys\Base\Events\SendMailEvent;
use Crysys\Base\Events\UpdatedContentEvent;
use Crysys\Base\Listeners\BeforeEditContentListener;
use Crysys\Base\Listeners\CreatedContentListener;
use Crysys\Base\Listeners\DeletedContentListener;
use Crysys\Base\Listeners\SendMailListener;
use Crysys\Base\Listeners\UpdatedContentListener;
use Event;
use File;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SendMailEvent::class          => [
            SendMailListener::class,
        ],
        CreatedContentEvent::class    => [
            CreatedContentListener::class,
        ],
        UpdatedContentEvent::class    => [
            UpdatedContentListener::class,
        ],
        DeletedContentEvent::class    => [
            DeletedContentListener::class,
        ],
        BeforeEditContentEvent::class => [
            BeforeEditContentListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        Event::listen(['cache:cleared'], function () {
            File::delete([storage_path('cache_keys.json'), storage_path('settings.json')]);
        });
    }
}
