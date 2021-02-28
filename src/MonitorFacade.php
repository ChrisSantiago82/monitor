<?php

namespace chrissantiago82\monitor;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Chrissantiago82\Monitor\Skeleton\SkeletonClass
 */
class MonitorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'monitor';
    }
}
