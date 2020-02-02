<?php
 class ViewModels_Category extends ViewModels_Abstract
 {

   public function ListProduct($catname)
   {
      $category = new Models_CategoryModel();
      return $category->ListProductBySlug($catname);
   }

 }
