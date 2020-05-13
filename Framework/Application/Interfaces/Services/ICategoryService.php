<?php 
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Interfaces\Services;
use GadgetCommerce\Core\Application\Entity\Category;
use GadgetCommerce\Core\Application\Interfaces\Repository\ICategoryRepository;

interface ICategoryService{

    public function Create(Category $entity): Category;
    public function Update(Category $entity): Category;
    public function Delete(Category $entity): int;
    public function List(): array;
    public function Get(int $id): Category;  
}