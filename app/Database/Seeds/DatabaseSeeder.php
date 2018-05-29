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
        auth()->forget();

        cookie()->destroy('city');

        $this->call(CreateDatabaseSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(CitiesTableSeeder::class);

        $this->call(PromotionsTableSeeder::class);

        $this->call(NeighborhoodsTableSeeder::class);

        $this->call(RolesTableSeeder::class);

        $this->call(UsersTableSeeder::class);
    }

    protected function call($seeder)
    {
        return $this->container
            ->make($seeder)
            ->run();
    }
}
