<?php 
declare(strict_types=1);
namespace GadgetCommerce\Core\Application\Interfaces\Repository;
use GadgetCommerce\Core\Application\Entity\Cart;

interface ICartRepository{
    public function Create(Cart $entity): Cart;
    public function Update(Cart $entity): Cart;
    public function Delete(Cart $entity): int;
    public function Get(Cart $entity): Cart;
}