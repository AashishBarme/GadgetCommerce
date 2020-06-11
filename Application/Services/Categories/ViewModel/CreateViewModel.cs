using System;
using System.Linq;
using System.Collections.Generic;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Services.Categories.ViewModel
{
    public class CreateViewModel 
    {
        public string Name {get; set;}
        public string Slug {get; set;}
        public string Description {get; set;}
    }
}