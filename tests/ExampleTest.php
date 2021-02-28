<?php

namespace Chrissantiago82\Monitor\Tests;

use Orchestra\Testbench\TestCase;
use Chrissantiago82\Monitor\MonitorServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MonitorServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
