using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.ViewModel
{
    public class ProductViewModel
    {
            public Product Product { get; set; }
            public IEnumerable<Category> Categories {get; set;}   

    }
}