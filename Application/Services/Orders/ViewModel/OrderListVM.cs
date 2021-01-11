namespace GadgetCommerce.Application.Services.Orders.ViewModel
{
    public class OrderListVM
    {
        public int Id {get; set;}
        public string ProductName{get;set;}
        public string CustomerName{get; set;}
        public string ShippingAddress{get; set;}
        public string OrderStatus {get; set;}
    }
}