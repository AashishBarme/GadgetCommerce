<?php
  class ViewModels_Abstract{

   public function getHeaderMenu()
   {
     $category = new Models_CategoryModel();
     $list = $category->List();
     $keyValuePairs = []; // hashmap / hashset/ dictionary/  KeyValuePair
     foreach ($list as $item)
     {

        $keyValuePairs[$item->Slug] = $item->Name;
     }
     return $keyValuePairs;
   }
 }
