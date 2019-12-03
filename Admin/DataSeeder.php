<?php

class DataSeeder{

    $DbConnection = null
    public function __construct(){


    }

    public function  SeedDatabase(){
        $this->CreateCategoies();
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
    private function CreateCategory($category){

    }
    private function GetCategories(){

    }

    private function CreateProducts($Categories)
    {
        foreach($Categories as $Category)
        {
            $this->CreateProduct($Category->Id);
        }
    }
    private function CreateProduct($CategoryId){
        // create product
    }

    private function GetAllProducts()
    {

    }

}
