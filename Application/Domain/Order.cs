using System;

namespace GadgetCommerce.Application.Domain
{
    public class Order
    {
        public int Id {get;  set;}
        public virtual Product Product {get; set;}
        public int ProductId {get;  set;}
        public virtual Customer Customer {get; set;}
        public int CustomerId {get;  set;}
        public string PaymentMethod {get;  set;}
        public string ShippingAddress {get;  set;}
        public string BillingAddress {get;  set;}
        public int OrderStatus {get;  set;}
    }
    
}