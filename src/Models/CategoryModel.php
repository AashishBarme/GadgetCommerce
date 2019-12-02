<?php
class Models_CategoryModel extends Models_AbstractModel
{
    public function getCategoryList(){

        return $this->getDb()->fetchAll("SELECT Slug,Name,Description FROM Category");
    }
    public function deleteCategoryBySlug($slug){
        //$slug =preg_replace("#[^a-zA-Z0-9-]#","",$slug);

        $sql = "DELETE FROM Category WHERE Slug='$slug'";
        echo $sql;
        $query = $this->getDb()->query($sql);
    }
}
