<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;
use League\CLImate\CLImate as Base;

class CLImate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return Base::class;
    }
}
