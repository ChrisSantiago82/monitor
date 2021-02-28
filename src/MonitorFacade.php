<?php

namespace Chrissantiago82\Monitor;

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
