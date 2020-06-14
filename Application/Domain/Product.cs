using System;

using System.ComponentModel;
using Microsoft.AspNetCore.Http;
using System.ComponentModel.DataAnnotations;

namespace GadgetCommerce_v2.Application.Domain
{
    public class Product
    {
        public int Id {get;  set;}
        public virtual Category Category{get; set;}
        public int CategoryId {get;  set;}
        [Required]
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        public string ProductSku {get;  set;}
        [Required]
        public double ProductPrice {get;  set;}
        public string ProductImage {get;  set;}
    }
}