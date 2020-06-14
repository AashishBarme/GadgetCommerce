using System.Collections.Generic;
using System.ComponentModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Products.ViewModel
{
    public class ProductCreateVM
    {
        [DisplayName("Name")]
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        [DisplayName("SKU")]        
        public string ProductSku {get;  set;}
        [DisplayName("Price")]        
        public double ProductPrice {get;  set;}
        [DisplayName("Image")]        
        public string ProductImage {get;  set;}
        [DisplayName("Category Name")]
        public int CategoryId {get; set;}
        public IEnumerable<Category> Categories {get; set;}   
    }
}