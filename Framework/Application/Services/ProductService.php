<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Services;

use GadgetCommerce\Core\Application\Entity\Product;
use GadgetCommerce\Core\Application\Exceptions\ServiceException;
use GadgetCommerce\Core\Application\Interfaces\Repository\IProductRepository;
use GadgetCommerce\Core\Application\Interfaces\Services\IProductService;

class ProductService implements IProductService{
    private $Repository;
    public function __construct(IProductRepository $repository = null){
        if($repository !== null)
        {
            $this->Repository = $repository;
        }
    }

    public function Create(Product $entity): Product
    {
        return $this->Repository->Create($entity);
    }
    public function Update(Product $entity): Product
    {
        return $entity;
    }
    public function Delete(Product $entity): int
    {
        return 0;
    }
    public function List(): array
    {
        return [];
    }
    public function Get(string $slug): Product
    {
        return new Product();
    }
}