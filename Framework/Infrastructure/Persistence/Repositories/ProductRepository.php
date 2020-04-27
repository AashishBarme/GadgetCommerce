<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Infrastructure\Persistence\Repositories;

use GadgetCommerce\Core\Application\Interfaces\Repository\IProductRepository;
use GadgetCommerce\Core\Application\Entity\Product;

class ProductRepository implements IProductRepository{    
    private $lastId=0;
    private $Db;
    private $Collection;

    public function __construct($db = null)
    {
        $this->Db = $db;
        $this->Collection = [];
    }

    public function Create(Product $entity): Product
    {
        $entity->Id = ++$this->lastId;
        $this->Collection[$entity->Id] = $entity;
        return $entity;
    }
    public function Update(Product $entity): Product
    {
        foreach($this->Collection as $item)
        {
            if($item->Id == $entity->Id)
            {
                $item->CategoryId = $entity->CategoryId;
                $item->ProductName = $entity->ProductName;
                $item->ProductSlug = $entity->ProductSlug;
                $item->ProductSku = $entity->ProductSku;
                $item->ProductPrice = $entity->ProductPrice;
                $item->ProductImage = $entity->ProductImage; 
            }
        } 
    }
    public function Delete(Product $entity): int
    {
        unset($this->Collection[$entity->Id]);
        return 0;
    }
    public function List(): array
    {
        return $this->Collection;
    }
    public function Get(string $slug): Product
    {
        $entity = null;
        foreach($this->Collection as $item)
        {
            if($item->Id == $id)
            {
                return $item;
            }
        }
        return $entity;
    }
}