<?php

class Model_OrderModels extends Model_Abstract_Models
{

  public function Add(){
    $sql = "INSERT into Orders('ProductId','CustomerId','PayemntMethod','ShippingAddress','BillingAddress','OrderStatus') VALUES ($productid,$customerid,$paymentmethod,$shippingaddress,$billingaddress,$orderstatus)";
    return $this->getDb()->query($sql);
  }


}
