<?php 
declare(strict_types=1);

namespace GadgetCommerce\Core\Application\Interfaces\Services;
use GadgetCommerce\Core\Application\Entity\Category;
use GadgetCommerce\Core\Application\Interfaces\Repository\ICategoryRepository;

interface ICategoryService{

    public function SetRepository(ICategoryRepository $repo):void;
    public function GetRepository():ICategoryRepository;
    public function Create(Category $entity): Category;
    public function Update(Category $entity): Category;
    public function Delete(Category $entity): int;
    public function List(): array;
    public function Get(string $slug): Category;
    public function GetNameSlug(int $id): Category;
    
}