<?php 
declare(strict_types=1);
namespace GadgetCommerce\Core\Application\Interfaces\Services;
use GadgetCommerce\Core\Application\Entity\Cart;
use GadgetCommerce\Core\Application\Interfaces\Repository\ICartRepository;

interface ICartService{
    public function SetRepository(ICartRepository $repo): void;
    public function GetRepository(): ICartRepository;
    public function Create(Cart $entity): Cart;
    public function Update(Cart $entity): Cart;
    public function Delete(Cart $entity): int;
    public function Get(Cart $entity): Cart;
}