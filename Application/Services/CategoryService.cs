using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Data;


namespace GadgetCommerce_v2.Application.Services
{
    public class CategoryService : Service<Category> , ICategoryService
    {
        public CategoryService(ApplicationDbContext context) : base(context)
        {

        }

    }
}