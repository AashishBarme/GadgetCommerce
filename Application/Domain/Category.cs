using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
namespace GadgetCommerce.Application.Domain
{
    public class Category
    {
        public int Id { get; set; }
        [Required, MinLength(3), MaxLength(50)]
        public string Name { get; set; }
        public string Slug { get; set; }
        public string Description { get; set; }
    }
}