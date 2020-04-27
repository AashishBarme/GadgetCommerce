<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Interfaces\Repository;
use GadgetCommerce\Core\Application\Entity\Product;

interface IProductRepository{

    public function Create(Product $entity): Product;
    public function Update(Product $entity): Product;
    public function Delete(Product $entity): int;
    public function List(): array;
    public function Get(string $slug): Product;

}