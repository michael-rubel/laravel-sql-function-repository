<?php

namespace MichaelRubel\SqlFunctionRepository\Tests;

use Illuminate\Database\QueryException;
use MichaelRubel\SqlFunctionRepository\SqlFunctionRepository;
use MichaelRubel\SqlFunctionRepository\Traits\ResolvesDatabaseDriver;

class SqlFunctionRepositoryTest extends TestCase
{
    use ResolvesDatabaseDriver;

    /** @test */
    public function testPostgresqlRepositoryReturnsExceptionOnSqlite()
    {
        if ($this->usingSQLite()) {
            $this->expectException(QueryException::class);

            $repository = app(SqlFunctionRepository::class);

            $repository->runDatabaseFunction('testFunctionName', ['value']);
        }

        $this->assertTrue(true);
    }
}
