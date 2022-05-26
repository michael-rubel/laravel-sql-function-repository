<?php

use Illuminate\Support\Facades\DB;

return [

    /*
    |--------------------------------------------------------------------------
    | Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Database connection name to use by the repository.
    |
    | Default: `pgsql`
    |
    */

    'connection' => DB::getDefaultConnection(),

    /*
    |--------------------------------------------------------------------------
    | Default select statement
    |--------------------------------------------------------------------------
    |
    | Default: `select * from `
    |
    */

    'select' => 'select * from ',

];
