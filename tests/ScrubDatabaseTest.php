<?php

namespace JacobGardiner\Scrubbable\Tests;

use Orchestra\Testbench\TestCase;

class ScrubDatabaseTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set('scrubbable.factory_path', 'JacobGardiner\Scrubbable\Tests\Fixtures\Factories');
    }

    /** @test */
    public function it_scrubs()
    {
        $this->assertTrue(true);
    }
}
