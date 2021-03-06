using System;

using System.ComponentModel;
using Microsoft.AspNetCore.Http;
using System.ComponentModel.DataAnnotations;
using GadgetCommerce.Application.Enums;
namespace GadgetCommerce.Application.Domain
{
    public class Product
    {
        public int Id {get;  set;}
        public ProductStatus Status{get; set;}
        public string TemporaryCategory {get; set;}
        public virtual Category Category{get; set;}
        public int CategoryId {get;  set;}
        [Required]
        public string ProductName {get;  set;}
        public string ProductSlug {get;  set;}
        public string ProductSku {get;  set;}
        public double ProductPrice {get;  set;}
        public string ProductImage {get;  set;}
    }
}