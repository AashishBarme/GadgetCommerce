using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
using System.ComponentModel;
namespace GadgetCommerce_v2.Application.Services.Products.ViewModel
{
    public class ProductUpdateVM
    {
        public int Id {get; set;}
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
        [DisplayName("Update Image")]
        public string ProductUpdatedImage {get; set;}
        public IEnumerable<Category> Categories {get; set;}



    }
}