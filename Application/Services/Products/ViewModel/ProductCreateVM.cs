using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Products.ViewModel
{
    public class ProductCreateVM
    {
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        public string ProductSku {get;  set;}
        public double ProductPrice {get;  set;}
        public string ProductImage {get;  set;}
        public int CategoryId {get; set;}
        public IEnumerable<Category> Categories {get; set;}   
    }
}