<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class dbcreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new MySQL database based on config file or the provided parameter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {
        $schemaName = $this->argument('name') ?: config('database.connections.mysql.database');

        $charset = config('database.connections.mysql.charset', 'utf8mb4');

        $collation = config('database.connections.mysql.collation', 'utf8mb4_general_ci');

        config(['database.connections.mysql.database' => null]);

        $query = "DROP DATABASE IF EXISTS $schemaName;";
        DB::statement($query);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
        DB::statement($query);

        echo "Database $schemaName created successfully".PHP_EOL;

        config(['database.connections.mysql.database' => $schemaName]);
    }
}
