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
        $sql = 'UPDATE Category SET Name = :Name,Description = :Description WHERE Id = :Id';
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(['Name' => $entity->Name , 'Description' =>$entity->Description , 'Id'=>$entity->Id]);
        return $entity;
    }
    public function Delete(Category $entity): int
    {
        $sql = 'DELETE FROM Category WHERE Id= :Id';
        $stmt = $this->Db->prepare($sql);
        return $stmt->execute(['Id'=>$entity->Id]);
    }

    public function List(): array
    {
        $entity = new Category();
        $stmt = $this->Db->prepare('SELECT * FROM Category');
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_INTO, $entity);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function Get(int $id): Category
    {
        $entity = new Category();

        $sql = 'SELECT * FROM Category WHERE Id=:Id';
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(['Id'=>$id]);
        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        $entity->Name = $result->Name;
        $entity->Slug = $result->Slug;
        $entity->Description = $result->Description;

        return $entity;
    }

}