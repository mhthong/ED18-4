<?php

namespace Crysys\Base\Facades;

use Crysys\Base\Supports\EmailHandler;
use Illuminate\Support\Facades\Facade;

class EmailHandlerFacade extends Facade
{

    /**
     * @return string
     * @since 2.2
     */
    protected static function getFacadeAccessor()
    {
        return EmailHandler::class;
    }
}
