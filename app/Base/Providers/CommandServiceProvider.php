<?php

namespace Crysys\Base\Providers;

use Crysys\Base\Commands\ClearLogCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->commands([
            ClearLogCommand::class,
        ]);
    }
}
