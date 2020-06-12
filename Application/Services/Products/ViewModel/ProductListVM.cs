using System;
using System.Collections;
using System.Linq;
using System.Threading.Tasks;

namespace GadgetCommerce_v2.Application.Services.Products.ViewModel
{
    public class ProductListVM
    {
        public int Id {get; set;}
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        public string ProductSku {get;  set;}
        public double ProductPrice {get;  set;}
        public string ProductImage {get;  set;}
        public string CategoryName {get; set;}
    }
}