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
            $this->Repository = $repository;   
        }
    }

    public function Create(Category $entity): Category
    {
       return $this->Repository->Create($entity);
    }
    
    public function Update(Category $entity): Category
    {
        return $this->Repository->Update($entity);
    }
    
    public function Delete(Category $entity): int
    {
        return $this->Repository->Delete($entity);
    }
    
    public function List(): array
    {
        return $this->Repository->List();
    }

    public function Get(int $id): Category
    {
        return $this->Repository->Get($id);
    }

}