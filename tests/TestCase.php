<?php

namespace MichaelRubel\SqlFunctionRepository\Tests;

use MichaelRubel\SqlFunctionRepository\SqlFunctionRepositoryServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            SqlFunctionRepositoryServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('testing');
    }
}
