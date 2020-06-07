using System;
namespace GadgetCommerce_v2.Application.Domain
{
    public class Cart
    {
        public int CartId { get; set; }
        public virtual Product Product{get; set;}
        public int ProductId { get; set; }
        public int Quantity { get; set; }
        public virtual Customer Customer {get; set;}
        public int CustomerId { get; set; }
    }
}