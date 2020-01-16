<?php
/**
 *
 */
class Models_CustomerModel extends Models_AbstractModel
{
      public function getAllCostumer(){
        return $this->getDb()->fetchAll("SELECT * FROM Customer");
      }

      public function addCustomer($firstname,$lastname,$username,$password){
        $sql = "INSERT into Customer(FirstName,LastName,UserName,Password) VALUES('$firstname','$lastname','$username','$password')";
        return  $this->getDb()->query($sql);
      }

      public function deleteCustomerById($customerid){
        $customerid = preg_replace("#[^0-9]#","",$customerid);
        $sql = "DELETE FROM Customer where Id='$customerid'";
        $query = $this->getDb()->query($sql);
      }

      public function displayCustomerDataById($customerid){
        $customerid = preg_replace("#[^0-9]#","",$customerid);
        $sql = "SELECT FirstName,LastName,UserName,Password FROM Customer WHERE Id='$customerid'";
        return $this->getDb()->fetchAll($sql);
      }

      public function updateCustomerDataById($customerid){
        $customerid = preg_replace("#[^0-9]#","",$customerid);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "UPDATE Customer SET FirstName='$firstname',LastName='$lastname',UserName='$username',Password='$password' WHERE Id='$customerid'";
        $query = $this->getDb()->query($sql);
      }



}
