using System;
using System.Collections.Generic;
using System.Linq;
using GadgetCommerce.Data;
using GadgetCommerce.Application.Domain;
using GadgetCommerce.Application.Services.Categories.ViewModel;

namespace GadgetCommerce.Application.Services.Categories
{
    public class CategoryQueryService : ICategoryQueryService
    {
        protected readonly ApplicationDbContext _context;
        private readonly Category _category;
        public CategoryQueryService(ApplicationDbContext context)
        {
            _context = context;
            _category = new Category();
        }
          public Category GetById(int id)
        {
            return _context.Set<Category>().Find(id);
        }

        public IEnumerable<Category> List()
        {
            return _context.Set<Category>();
        }
         public int Count()
        {
            return _context.Category.Where(x => true).Count();
        }
    }
}