<?php

class DataSeeder{

    private $CategoryModel;
    public function __construct(){

        $this->CategoryModel = new Models_CategoryModel();
    }

    public function  SeedDatabase(){
        
        $this->CreateCategories();
        $Categories = $this->GetCategories();
        if(!$Categories)
        {
                // $this->CreateProducts($categories)
        }
        //product

        // create CreateProduct
        // GetAllProducts
        // Create Customers
        // Create Orders
    }

    private function CreateCategories(){
       $Categories =[
           ["Name"=>"Test" , "Description" =>"Test Description"],
           ["Name"=>"Test" , "Description" =>"Test Description"],
           ["Name"=>"Test" , "Description" =>"Test Description"],
           ["Name"=>"Test" , "Description" =>"Test Description"],
           ["Name"=>"Test" , "Description" =>"Test Description"],
       ];
       foreach($Categories as $Category){
           $this->CreateCategory($Category);
       }
    }
    private function CreateCategory($Category){
        $this->CategoryModel->addCategory($Category["Name"],$Category["Description"]);
    }
    private function GetCategories(){

    }

    private function CreateProducts($Categories)
    {
        foreach($Categories as $Category)
        {
            $this->CreateProduct();
        }
    }
    private function CreateProduct($CategoryId){
        // create product
    }

    private function GetAllProducts()
    {

    }

}
