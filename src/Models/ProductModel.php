<?php
/**
 *
 */
class Models_ProductModel extends Models_AbstractModel
{
    public function addProductData($imgfile){
      $catId = $_POST['categoryId'];
      $name = $_POST['name'];
      $sku = $_POST['sku'];
      $price = $_POST['price'];
      $slug = slugify($name);
      $sql = "INSERT INTO Product(CategoryId,ProductName,ProductSlug,ProductSku,ProductPrice,ProductImage) VALUES('$catId','$name','$slug','$sku','$price','$imgfile')";
      return $this->getDb()->query("$sql");
    }

    public function getProductList(){
    return $this->getDb()->fetchAll("SELECT * FROM Product");
    }

    public function deleteProductBySlug($slug){
        $slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
        $sql = "DELETE FROM Product WHERE Slug='$slug'";
        $query = $this->getDb()->query($sql);
    }

    public function updateProductById($id,$name,$price,$sku,$catId){
      $slug = slugify($name);
      $sql = "UPDATE Product SET ProductName='$name',ProductSlug='$slug',ProductPrice='$price',ProductSku='$sku',CategoryId='$catId' WHERE Id='$id'";
      $query = $this->getDb()->query($sql);
    }

    public function displayProductBySlug($slug){
      $slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
      return $this->getDb()->fetchAll("SELECT * FROM Product WHERE ProductSlug='$slug'");
    }
}
