<?php

namespace GadgetCommerce\Core\Application\Services;
use GadgetCommerce\Core\Application\Entity\Category;
use GadgetCommerce\Core\Application\Interfaces\Services\ICategoryService;
use GadgetCommerce\Core\Application\Interfaces\Repository\ICategoryRepository;
use GadgetCommerce\Core\Application\Exceptions\ServiceException;

class CategoryService implements ICategoryService{
    private $Repository;

    public function __construct(ICategoryRepository $repository = null)
    {
        if($repository !== null)
        {
            $this->SetRepository($repository);    
        }
    }

    public function SetRepository(ICategoryRepository $repository):void
    {   
        $this->Repository = $repository;
    }
    
    public function GetRepository():ICategoryRepository
    {
        return $this->Repository;
    }

    public function Create(Category $entity): Category
    {
       return $this->GetRepository()->Create($entity);
    }
    
    public function Update(Category $entity): Category
    {
        return $entity;
    }
    
    public function Delete(Category $entity): int
    {
        return 0;
    }
    
    public function List(): array
    {
        return [];
    }

    public function Get(string $slug): Category
    {
        $entity = new Category;
        return $entity;
    }

    public function GetNameSlug(int $id): Category
    {
        $entity = new Category;
        return $entity;
    }
}