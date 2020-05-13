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
       return $this->Repository->Update($entity);
    }

    public function Delete(Product $entity): int
    {
        return $this->Repository->Delete($entity);
    }

    public function List(): array
    {
        return $this->Repository->List();
    }
    
    public function Get(int $id): Product
    {
        return $this->Repository->Get($id);
    }
}