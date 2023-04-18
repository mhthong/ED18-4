<?php

namespace App\Providers;

use App\Http\ViewComposers\MovieComposer;
use App\Http\ViewComposers\SettingComposer;
use App\Http\ViewComposers\SliderComposer;
use App\Http\ViewComposers\StaticPostComposer;
use App\Http\ViewComposers\PostComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'app',
            'layouts.header',
            'admin.category',
            'admin.Posts.create',
            'admin.Posts.edit',
            'admin.Posts.index',

        ],
         MovieComposer::class);

         View::composer([
            'app',
            'layouts.header',
            'playout',
            'layouts.footer',
            'layouts.content',
        ],
         SettingComposer::class);


        View::composer([
            'layouts.slider'
        ],
        SliderComposer::class);


        View::composer([
            'layouts.content',
            'layouts.page'
        ],
        StaticPostComposer::class);

        View::composer([
            'layouts.content',
            'layouts.footer',
            'layouts.caretoties',
        ],
        PostComposer::class);
    }
}
