<?php

namespace Crysys\Base\Facades;

use Crysys\Base\Supports\PageTitle;
use Illuminate\Support\Facades\Facade;

class PageTitleFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PageTitle::class;
    }
}
