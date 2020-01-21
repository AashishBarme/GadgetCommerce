<?php
/**
 *
 */
class Models_ProductModel extends Models_AbstractModel
{
    public function addProductData($catId,$name,$sku,$price){
      $stringHelper = new Helpers_StringHelper();
      $slug = $stringHelper->slugify($name);
      $sql = "INSERT INTO Product(CategoryId,ProductName,ProductSlug,ProductSku,ProductPrice) VALUES('$catId','$name','$slug','$sku','$price')";
      return $this->getDb()->query($sql);
    }

    public function getProductList(){
    return $this->getDb()->fetchAll("SELECT * FROM Product");
    }


    public function deleteProductBySlug($id){
        //$slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
        $sql = "DELETE FROM Product WHERE Slug='$id'";
        $query = $this->getDb()->query($sql);
    }

    public function updateProductById($id,$name,$price,$sku,$catId,$productimage){
      $stringHelper = new Helpers_StringHelper();
      $slug = $stringHelper->slugify($name);
      $sql = "UPDATE Product SET ProductName='$name',ProductSlug='$slug',ProductPrice='$price',ProductImage='$productimage',ProductSku='$sku',CategoryId='$catId' WHERE Id='$id'";
      $query = $this->getDb()->query($sql);
    }

    public function displayProductBySlug($id){
      //$slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
      return $this->getDb()->fetchAll("SELECT * FROM Product WHERE Id='$id'");
    }

    public function uploadProductImage(){
      $errors= array();
      $file_name = $_FILES['productImage']['name'];
      $file_size =$_FILES['productImage']['size'];
      $file_tmp =$_FILES['productImage']['tmp_name'];
      $file_type=$_FILES['productImage']['type'];
      $tmp = explode('.', $file_name);
      $file_ext = strtolower(end($tmp));
      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,UPLOAD_PATH.$file_name);
         echo "Success";
      }else{
         print_r($errors);
        }
      }
}
