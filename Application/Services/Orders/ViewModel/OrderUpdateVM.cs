using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Orders.ViewModel
{
    public class OrderUpdateVM
    {
      public int Id {get; set;}
      public int ProductId {get; set;}
      public int CustomerId {get; set;}
      public string ProductName {get; set;}
      public string CustomerName {get; set;}
      public string BillingAddress {get; set;}
      public string ShippingAddress {get; set;}
      public string PaymentMethod {get; set;}
      public int OrderStatus{get; set;}  

      public Product Product {get; set;}
    }
}