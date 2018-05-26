<?php

namespace App\Database\Seeds;

use Itm\Contracts\Database\Seeder;
use Illuminate\Database\ConnectionInterface as Connection;

class CreateDatabaseSeeder implements Seeder
{
    /**
     * @var Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function run(): void
    {
        // TODO: Execute script on database:
        // $script = $this->creationDBScript();
    }

    protected function creationDBScript(): string
    {
        // TODO:
    }
}
