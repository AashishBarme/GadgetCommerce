<?php
declare(strict_types=1);

namespace GadgetCommerce\Core\Infrastructure\Persistence\Repositories;

use GadgetCommerce\Core\Application\Interfaces\Repository\IProductRepository;
use GadgetCommerce\Core\Application\Entity\Product;

class ProductRepository implements IProductRepository{    
    private $Db;

    public function __construct($db)
    {
        $this->Db = $db;
    }

    public function Create(Product $entity): Product
    {
        $sql = "INSERT INTO Product(`CategoryId`,`ProductName`,`ProductSlug`,`ProductSku`,`ProductPrice`,`ProductImage`) VALUES (:CategoryId, :ProductName, :ProductSlug, :ProductSku, :ProductPrice, :ProductImage)";
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(['CategoryId'=>$entity->CategoryId, 
                        'ProductName'=>$entity->ProductName, 
                        'ProductSlug'=>$entity->ProductSlug, 
                        'ProductSku' => $entity->ProductSku,
                        'ProductPrice'=>$entity->ProductPrice, 
                        'ProductImage'=>$entity->ProductImage]);
        $entity->Id = intval($this->Db->lastInsertId());   
                       
        return $entity;
    }

    public function Update(Product $entity): Product
    {
        $sql = "UPDATE Product SET CategoryId=:CategoryId,ProductName=:ProductName,ProductSlug=:ProductSlug,ProductSku=:ProductSku,ProductPrice=:ProductPrice,ProductImage=:ProductImage WHERE Id=:Id";
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(["Id" => $entity->Id,
                        "CategoryId"=>$entity->CategoryId,
                        "ProductName"=>$entity->ProductName,
                        "ProductSlug"=>$entity->ProductSlug,
                        'ProductSku' => $entity->ProductSku,
                        "ProductPrice"=>$entity->ProductPrice,
                        "ProductImage"=>$entity->ProductImage]);
        return $entity;                
    }

    public function Delete(Product $entity): int
    {
        $sql = "DELETE FROM Product WHERE Id=:Id";
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(["Id"=>$entity->Id]); 
        return 1;
    }

    public function List(): array
    {
        $entity = new Product();

        $sql = "SELECT * FROM Product";
        $stmt = $this->Db->prepare($sql);
        $stmt->execute();
        $stmt->SetFetchMode(\PDO::FETCH_INTO,$entity);
        return $stmt->fetchAll();    
    }

    public function Get(int $id): Product
    {
        $entity = new Product();

        $sql = "SELECT * FROM Product WHERE Id = :Id";
        $stmt = $this->Db->prepare($sql);
        $stmt->execute(["Id"=>$id]);
        $stmt->SetFetchMode(\PDO::FETCH_INTO,$entity);
        $stmt->fetch();
        
        return $entity;
    }
}