<?php

declare(strict_types=1);

namespace MichaelRubel\SqlFunctionRepository;

use MichaelRubel\SqlFunctionRepository\Repositories\PostgresqlFunctionRepository;
use MichaelRubel\SqlFunctionRepository\Traits\ResolvesDatabaseDriver;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SqlFunctionRepositoryServiceProvider extends PackageServiceProvider
{
    use ResolvesDatabaseDriver;

    /**
     * Configure the package.
     *
     * @param Package $package
     *
     * @return void
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-sql-function-repository')
            ->hasConfigFile();
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    public function packageRegistered(): void
    {
        $this->app->singleton(
            SqlFunctionRepository::class,
            PostgresqlFunctionRepository::class
        );
    }
}
