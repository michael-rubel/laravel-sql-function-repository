<?php

namespace MichaelRubel\SqlFunctionRepository\Tests;

use Illuminate\Database\QueryException;
use MichaelRubel\SqlFunctionRepository\Repositories\PostgresqlFunctionRepository;
use MichaelRubel\SqlFunctionRepository\SqlFunctionRepository;
use MichaelRubel\SqlFunctionRepository\Traits\ResolvesDatabaseDriver;

class SqlFunctionRepositoryTest extends TestCase
{
    use ResolvesDatabaseDriver;

    /** @test */
    public function testCanInvokePostgresRepositoryUsingInterface()
    {
        $repository = app(SqlFunctionRepository::class);

        $this->assertInstanceOf(PostgresqlFunctionRepository::class, $repository);
    }

    /** @test */
    public function testPostgresqlRepositoryReturnsExceptionWhenSqlite()
    {
        if ($this->usingSQLite()) {
            $this->expectException(QueryException::class);

            $repository = app(PostgresqlFunctionRepository::class);

            $repository->runDatabaseFunction('testFunctionName', ['value']);
        }

        $this->assertTrue(true);
    }
}
