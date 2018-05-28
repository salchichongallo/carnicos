<?php

namespace App\Database\Seeds;

use Meat\Commands\CreateProduct;
use Itm\Contracts\Database\Seeder;

class ProductsTableSeeder implements Seeder
{
    public function run(): void
    {
        foreach ($this->products() as $code => $product) {
            $createProduct = new CreateProduct;

            $createProduct->code = $code;
            $createProduct->name = $product['name'];
            $createProduct->price = $product['price'];
            $createProduct->presentation = $product['presentation'];

            dispatch($createProduct);
        }
    }

    protected function products()
    {
        return [
            'chor1' => [
                'name' => 'Chorizo',
                'price' => 4000,
                'presentation' => '300 gr'
            ],
            'chor2' => [
                'name' => 'Chorizo',
                'price' => 5300,
                'presentation' => '500 gr'
            ],
            'mor1' => [
                'name' => 'Mortadela',
                'price' => 3500,
                'presentation' => '250 gr'
            ],
            'mor2' => [
                'name' => 'Mortadela',
                'price' => 6000,
                'presentation' => '500 gr'
            ],
            'sala1' => [
                'name' => 'Salami',
                'price' => 4000,
                'presentation' => '50 gr'
            ],
            'sala2' => [
                'name' => 'Salami',
                'price' => 10000,
                'presentation' => '150 gr'
            ],
            'cost1' => [
                'name' => 'Costilla',
                'price' => 10000,
                'presentation' => '500 gr',
            ],
            'cost2' => [
                'name' => 'Costilla',
                'price' => 18000,
                'presentation' => '1000 gr',
            ],
            'morc1' => [
                'name' => 'Morcilla',
                'price' => 3000,
                'presentation' => '250 gr',
            ],
            'morc2' => [
                'name' => 'Morcilla',
                'price' => 5500,
                'presentation' => '500 gr',
            ],
            'scha1' => [
                'name' => 'Salchicha',
                'price' => 4000,
                'presentation' => '250 gr',
            ],
            'scha2' => [
                'name' => 'Salchicha',
                'price' => 7500,
                'presentation' => '500 gr',
            ],
            'schon1' => [
                'name' => 'Salchichón',
                'price' => 3000,
                'presentation' => '250 gr'
            ],
            'schon2' => [
                'name' => 'Salchichón',
                'price' => 5500,
                'presentation' => '500 gr',
            ],
        ];
    }
}
