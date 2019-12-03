<?php
class Models_CategoryModel extends Models_AbstractModel
{

    public function addCategory(){
      $name = $_POST['name'];
      $description = $_POST['description'];
      $slug = slugify($name);
      $sql = "INSERT into Category(Name,Slug,Description) VALUES('$name','$slug','$description')";
      $query = $this->getDb()->query($sql);
    }

    public function getCategoryList(){
        return $this->getDb()->fetchAll("SELECT Slug,Name,Description,Id FROM Category");
    }

    public function getCategoryDataById($id){
      return $this->getDb()->fetchAll("SELECT Name,Slug FROM Category WHERE Id='$id'");
    }

    public function updateCategoryById($id,$name,$description){
      $slug = slugify($name);
      $sql = "UPDATE Category SET Name='$name',Slug='$slug',Description='$description' WHERE Id='$id'";
      $query = $this->getDb()->query($sql);
    }
    public function deleteCategoryBySlug($slug){
        $slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
        $sql = "DELETE FROM Category WHERE Slug='$slug'";
        //echo $sql;
        $query = $this->getDb()->query($sql);
    }

    public function displayCategoryBySlug($slug){
        $slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);
        $sql = "SELECT * FROM Category WHERE Slug='$slug'";
        return $this->getDb()->fetchAll($sql);
    }


}