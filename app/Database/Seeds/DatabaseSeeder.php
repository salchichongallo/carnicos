<?php

namespace App\Database\Seeds;

use Itm\Contracts\Database\Seeder;
use Illuminate\Container\Container;

class DatabaseSeeder implements Seeder
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function run(): void
    {
        $this->call(CreateDatabaseSeeder::class);

        $this->call(CitiesTableSeeder::class);
    }

    protected function call($seeder)
    {
        return $this->container
            ->make($seeder)
            ->run();
    }
}
