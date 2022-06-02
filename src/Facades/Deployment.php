<?php

namespace Morningtrain\Deployment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Morningtrain\Deployment\Deployment
 */
class Deployment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'deployment';
    }
}
