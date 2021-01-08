<?php

namespace JacobGardiner\Scrubbable\Tests;

use Orchestra\Testbench\TestCase;
use JacobGardiner\Scrubbable\ScrubbableServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ScrubbableServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
