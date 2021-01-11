using System;
using System.Linq;
using System.Collections.Generic;
using System.Threading.Tasks;
using GadgetCommerce.Application.Domain;

namespace GadgetCommerce.Application.Services.Categories.ViewModel
{
    public class CategoryCreateVM 
    {
        public string Name {get; set;}
        public string Slug {get; set;}
        public string Description {get; set;}
    }
}