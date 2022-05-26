<?php

declare(strict_types=1);

namespace MichaelRubel\SqlFunctionRepository\Traits;

trait BuildsSqlFunctions
{
    /**
     * @param string $name
     * @param array  $parameters
     *
     * @return string
     */
    private function buildSqlFunction(string $name, array $parameters): string
    {
        $prepareForBindings = collect($parameters)->implode(
            fn ($param) => '?, '
        );

        return $this->select . ' ' . $name . str($prepareForBindings)
            ->replaceLast(', ', '')
            ->start('(')
            ->finish(')');
    }
}