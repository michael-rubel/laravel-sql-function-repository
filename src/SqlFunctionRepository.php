<?php

declare(strict_types=1);

namespace MichaelRubel\SqlFunctionRepository;

use Illuminate\Support\Facades\DB;
use MichaelRubel\SqlFunctionRepository\Traits\BuildsSqlFunctions;

class SqlFunctionRepository
{
    use BuildsSqlFunctions;

    /**
     * @param string|null $connection
     * @param string|null $select
     */
    public function __construct(
        public ?string $connection = null,
        public ?string $select = null,
    ) {
        if (is_null($this->connection)) {
            $this->connection = config('sql-function-repository.connection', 'default');
        }

        if (is_null($this->select)) {
            $this->select = config('sql-function-repository.select', 'select * from public');
        }
    }

    /**
     * Execute the database function.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return array
     */
    public function runDatabaseFunction(string $name, array $parameters): array
    {
        return DB::connection($this->connection)->select(
            $this->buildSqlFunction($name, $parameters),
            $parameters
        );
    }
}
