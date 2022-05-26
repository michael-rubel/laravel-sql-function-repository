<?php

declare(strict_types=1);

namespace MichaelRubel\SqlFunctionRepository\Repositories;

use Illuminate\Support\Facades\DB;
use MichaelRubel\SqlFunctionRepository\SqlFunctionRepository;

class PostgresqlFunctionRepository implements SqlFunctionRepository
{
    /**
     * @param string|null $connection
     * @param string|null $select
     */
    public function __construct(
        public ?string $connection = null,
        public ?string $select = null,
    ) {
        if (is_null($this->connection)) {
            $this->connection = config('sql-function-repository.connection', DB::getDefaultConnection());
        }

        if (is_null($this->select)) {
            $this->select = config('sql-function-repository.select', 'select * from ');
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
    public function runDatabaseFunction(string $name, array $parameters = []): array
    {
        return DB::connection($this->connection)->select(
            $this->buildSqlFunction($name, $parameters),
            $parameters
        );
    }

    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return string
     */
    protected function buildSqlFunction(string $name, array $parameters): string
    {
        $prepareForBindings = collect($parameters)->implode(fn () => '?, ');

        return $this->select . $name . str($prepareForBindings)
                ->replaceLast(', ', '')
                ->start('(')
                ->finish(')');
    }
}
