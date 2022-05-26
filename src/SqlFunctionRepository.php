<?php

declare(strict_types=1);

namespace MichaelRubel\SqlFunctionRepository;

interface SqlFunctionRepository
{
    /**
     * Execute the database function.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return array
     */
    public function runDatabaseFunction(string $name, array $parameters = []): array;
}
