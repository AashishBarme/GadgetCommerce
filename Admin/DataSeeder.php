<?php

class DataSeeder{

    private $CategoryModel;
    private $ProductModel;
    private $CustomerModel;
    public function __construct(){

        $this->CategoryModel = new Models_CategoryModel();
        $this->ProductModel  = new Models_ProductModel();
        $this->CustomerModel = new Models_CustomerModel();
    }

    public function SeedDatabase(){

      //  $this->CreateCategories();
      //  $this->CreateCustomers();
        $Categories = $this->GetCategories();
        if($Categories)
        {
                //$this->CreateProducts($Categories);
        }
    }

    private function CreateCategories(){
       $Categories =[
           ["Name"=>"Laptop Devices" , "Description" =>"Test Description"],
           ["Name"=>"Mobile" , "Description" =>"Test Description"],
           ["Name"=>"Gaming" , "Description" =>"Test Description"],
           ["Name"=>"Headphone" , "Description" =>"Test Description"],
           ["Name"=>"Drone" , "Description" =>"Test Description"],
       ];
       foreach($Categories as $Category){
           $this->CreateCategory($Category);
       }
    }

    private function CreateCategory($Category){
        $this->CategoryModel->addCategory($Category["Name"],$Category["Description"]);
    }
    private function GetCategories(){
      return $this->CategoryModel->getCategoryList();
    }

    private function CreateProducts($Categories)
    {
        foreach($Categories as $Category)
        {
            $this->CreateProduct($Category->Id);
        }
    }
    private function CreateProduct($CategoryId){
      //var_dump($CategoryId);
      $Products =[
        [ 'ProductName'=>'Samsung Galaxy','ProductSku'=>'S12','ProductPrice'=>500],
        [ 'ProductName'=>'Acer Laptop','ProductSku'=>'A12','ProductPrice'=>5500],
        [ 'ProductName'=>'Smart Watch','ProductSku'=>'SW12','ProductPrice'=>520],
      ];
      foreach ($Products as $Product)
      {
        $this->ProductModel->addProductData($CategoryId,$Product["ProductName"],$Product["ProductSku"],$Product["ProductPrice"]);
      }
        // create product
    }

    private function GetAllProducts()
    {

    }

    private function CreateCustomers(){
      $Customers = [
        ["FirstName"=>"Keanu","LastName"=>"Reeves","UserName"=>"johnwick","Password"=>"password"],
        ["FirstName"=>"Vin","LastName"=>"Diesel","UserName"=>"dom","Password"=>"password"],
        ["FirstName"=>"Rami","LastName"=>"Melek","UserName"=>"mrrobot","Password"=>"password"],
      ];
      foreach ($Customers as  $Customer){
        $this->CreateCustomer($Customer);
      }
    }

    private function CreateCustomer($Customer){
      $this->CustomerModel->addCustomer($Customer["FirstName"],$Customer["LastName"],$Customer["UserName"],$Customer["Password"]);
    }


}
