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
     * @param string $as
     *
     * @return array
     */
    public function runDatabaseFunction(string $name, array $parameters = [], string $as = ''): array
    {
        return DB::connection($this->connection)->select(
            $this->buildSqlFunction($name, $parameters, $as),
            $parameters
        );
    }

    /**
     * @param string $name
     * @param array  $parameters
     * @param string $as
     *
     * @return string
     */
    protected function buildSqlFunction(string $name, array $parameters, string $as): string
    {
        $prepareForBindings = collect($parameters)->implode(fn () => '?, ');

        $function = str($prepareForBindings)
            ->replaceLast(', ', '')
            ->start('(')
            ->finish(')');

        if (! empty($as)) {
            $function = $function->finish(' as ' . $as);
        }

        return $this->select . $name . $function;
    }
}
