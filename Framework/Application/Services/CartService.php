<?php
declare(strict_types=1);

namespace GadgetCommerce\core\Application\Services;
use GadgetCommerce\core\Application\Entity\Cart;
use GadgetCommerce\Core\Application\Interfaces\Services\ICartService;
use GadgetCommerce\core\Application\Interfaces\Repository\ICartRepository;
use GadgetCommerce\core\Application\Exceptions\ServiceException;

class CartService implements ICartService{
    private $Repository;

    public function __construct(ICartRepository $repository = null)
    {
        if($repository !== null)
        {
        $this->Repository = $repository;
        }
    }

    public function Create(Cart $entity): Cart
    {
        return $this->Repository->Create($entity);
    }   
    public function Update(Cart $entity): Cart
    {
        return $entity;
    }
    public function Delete(Cart $entity): int
    {
        return 0;
    }
    public function Get(Cart $entity): Cart
    {
        return new Cart();
    }
}