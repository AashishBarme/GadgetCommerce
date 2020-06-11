using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.ViewModel
{
    public class OrdersViewModel
    {
        public Order Order {get; set;}
        public Product Product {get; set;}
        public Customer Customer {get; set;}
        public string OrderStatusValue {get; set;}


    }
}