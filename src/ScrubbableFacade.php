<?php

namespace JacobGardiner\Scrubbable;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JacobGardiner\Scrubbable\Skeleton\SkeletonClass
 */
class ScrubbableFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'scrubbable';
    }
}
