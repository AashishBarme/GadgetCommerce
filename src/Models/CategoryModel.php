<?php
declare(strict_types=1);
use src\Interfaces\ICategory;
// list = multiple
// get = single
class Models_CategoryModel extends Models_AbstractModel implements ICategory
{
    private $SlugHelper;

    public function Add(){}
    public function Delete(){}
    Public function Update(){}

    public function addCategory($name,$description){
      $hs = new Helpers_StringHelper();
      
      //slug should be unique .. check if the slug exists before adding new one
      $slug = $this->GetSlugHelper()->slugify($name);
      $sql = "INSERT into Category(Name,Slug,Description) VALUES('$name','$slug','$description')";
      $query = $this->getDb()->query($sql);
    }

    public function List()
    {
     return $this->getDb()->fetchAll("SELECT Slug,Name,Description,Id FROM Category");
    }

    // TODO: delete this method in favor of ListCategory for naming consistency
    public function getCategoryList(){
        return $this->List();
    }

    public function ListProductBySlug(string $catname)
    {
        $catid = $this->getDb()->fetchAll("SELECT Id FROM Category where Slug = '$catname'");
        $id = $catid[0]->Id;
        return $this->getDb()->fetchAll("SELECT Id,ProductSlug,ProductName,ProductPrice,ProductImage FROM Product WHERE CategoryId='$id'");
    }

    public function getCategoryDataById($id){
      return $this->getDb()->fetchAll("SELECT Name,Slug FROM Category WHERE Id='$id'");
    }

    public function updateCategoryById(int $id,string $name,string $description):void
    {
      $sql = "UPDATE Category SET Name='$name',Description='$description' WHERE Id='$id'";
      $query = $this->getDb()->query($sql);
    }

    public function deleteCategoryBySlug(string $slug)
    {
        // check if id of this slug exists and delete with id.
        $sql = "DELETE FROM Category WHERE Slug='$slug'";
        //echo $sql;
        $query = $this->getDb()->query($sql);
    }

    public function displayCategoryBySlug(string $slug)
    {
        $bool = $this->GetSlugHelper()->VerifySlug($slug);
        if(!$bool)
        {
            throw new Exception_SlugNotExistsException(__METHOD__.": slug does not exists");
        }
        $sql = "SELECT * FROM Category WHERE Slug='$slug'";
        return $this->getDb()->fetchAll($sql);
    }

    private function GetSlugHelper()
    {
      if($this->SlugHelper == null)
      {
        $this->SlugHelper = new Helpers_StringHelper();
      }
      return $this->SlugHelper;
    }


}
