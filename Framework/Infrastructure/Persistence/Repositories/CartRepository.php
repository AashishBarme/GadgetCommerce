<?php
declare(strict_types=1);

namespace GadgetCommerce\core\Infrastructure\Persistence\Repositories;
use GadgetCommerce\core\Application\Entity\Cart;
use GadgetCommerce\Core\Application\Interfaces\Repository\ICartRepository;

class CartRepository implements ICartRepository{
    private $lastId = 0;
    private $Db;
    private $Collection;

    public function __construct($db = null)
    {
        $this->Db = $db;
        $this->Collection = [];
    }
    public function Create(Cart $entity): Cart
    {
        $entity->Id = ++$this->lastId;
        $this->Collection[$entity->Id] = $entity;
        return $entity;
    }
    public function Update(Cart $entity): Cart
    {
        foreach($Collection as $item)
        {
            if($item->Id == $entity->Id)
            {
                $item->CartId  = $entity->CartId;
                $item->ProductId = $entity->ProductId;
                $item->Quantity = $entity->Quantity;
                $item->CustomerId = $entity->CustomerId;
            }
        }
        return $entity;
    }

    public function Delete(Cart $entity): int
    {
        unset($this->Collection[$entity->Id]);
        return 0;
    }
    public function Get(Cart $entity): Cart
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