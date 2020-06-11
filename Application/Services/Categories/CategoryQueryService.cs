using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Categories
{
    public class CategoryQueryService : ICategoryQueryService
    {
        protected readonly ApplicationDbContext _context;
        public CategoryQueryService(ApplicationDbContext context)
        {
            _context = context;
        }
          public Category GetById(int id)
        {
            return _context.Set<Category>().Find(id);
        }

        public IEnumerable<Category> List()
        {
            return _context.Set<Category>();
        }
    }
}