<?php

namespace App\Repositories;

use Exception;
use App\Database\Table;
use Meat\Product\Presentation;
use Meat\Product\Product;
use App\Database\Mappers\ProductMapper;
use Illuminate\Database\ConnectionInterface as Connection;
use Meat\Repositories\PresentationRepository;
use Meat\Repositories\ProductRepository as ProductRepositoryContract;

class ProductRepository implements ProductRepositoryContract
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var ProductMapper
     */
    protected $mapper;

    /**
     * @var \Meat\Repositories\PresentationRepository
     */
    protected $presentationRepository;

    public function __construct(
        Connection $db,
        ProductMapper $mapper,
        PresentationRepository $presentationRepository
    )
    {
        $this->db = $db;
        $this->mapper = $mapper;
        $this->presentationRepository = $presentationRepository;
    }

    public function add(Product $product): bool
    {
        if ($this->shouldCreatePrensentation($product)) {
            $this->presentationRepository->add($product->getPresentation());
        }

        return $this->db
            ->table(Table::PRODUCTS)
            ->insert($this->mapper->forInsert(
                $product
            ));
    }

    protected function shouldCreatePrensentation(Product $product): bool
    {
        return ! $this->presentationRepository->exists(
            $product->getPresentation()->getId()
        );
    }

    /**
     * @param string $code
     * @return Product
     * @throws Exception
     */
    public function find(string $code): Product
    {
        $result = $this->db->table(Table::VIEW_PRODUCTS)
            ->where('codigo', '=', $code)->first();

        if (! $result) {
            throw new Exception("Product [{$code}] not found.");
        }

        $product = $this->mapper->fromView($result);

        $presentation = $this->presentationRepository->find(
            $product->getPresentation()->getId()
        );

        $product->setPresentation($presentation);

        return $product;
    }
}
