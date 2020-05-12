<?php

namespace GadgetCommerce\Core\Infrastructure\Persistence\Repositories;

use GadgetCommerce\Core\Application\Interfaces\Repository\ICategoryRepository;
use GadgetCommerce\Core\Application\Entity\Category;

class CategoryRepository implements ICategoryRepository{
    private $Db;

    public function __construct($db)
    {
        $this->Db = $db;
    }

    public function Create(Category $entity): Category
    {
        $stmt = $this->Db->prepare('INSERT INTO Category(`Name`,`Slug`,`Description`) Values (:Name, :Slug, :Description)');
        $stmt->execute(['Name' => $entity->Name, 'Slug' => $entity->Slug,'Description'=> $entity->Description]);
        $entity->Id = $this->Db->lastInsertId();
        return $entity;
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
         // $result->setFetchMode(\PDO::FETCH_INTO, $entity)
        // $user = $stmt->fetch();
        return [];
    }

    public function Get(string $slug): Category
    {
        $entity = new Category();
        return $entity;
    }
    public function GetNameSlug(int $id): Category
    {
        $entity = new Category();
        return $entity;
    }

    public function testConnection()
    {
        var_dump($this->Db);
    }

}