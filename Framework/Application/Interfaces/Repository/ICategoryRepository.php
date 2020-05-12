<?php declare(strict_types=1);
namespace GadgetCommerce\Core\Application\Interfaces\Repository;
use GadgetCommerce\Core\Application\Entity\Category;

interface ICategoryRepository{
    public function Create(Category $entity): Category;
    public function Update(Category $entity): Category;
    public function Delete(Category $entity): int;
    public function List(): array;
    public function Get(string $slug): Category;
    public function GetNameSlug(int $id): Category;
    
}