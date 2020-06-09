using System;
using Microsoft.AspNetCore.Http;
using System.ComponentModel.DataAnnotations.Schema;
namespace GadgetCommerce_v2.Application.Domain
{
    public class Product
    {
        public int Id {get;  set;}
        public virtual Category Category{get; set;}
        public int CategoryId {get;  set;}
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        public string ProductSku {get;  set;}
        public double ProductPrice {get;  set;}
        public string ProductImage {get;  set;}
    }
}