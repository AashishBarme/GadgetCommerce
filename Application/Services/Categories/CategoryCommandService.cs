using System;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Categories
{
    public class CategoryCommandService : ICategoryCommandService
    {
        protected readonly ApplicationDbContext _context;
        private Category _category;
        public CategoryCommandService(ApplicationDbContext context)
        {
            _context = context;
            _category = new Category();
        }
         public void Create(CreateViewModel createVM)
        {
            _category.Name = createVM.Name;
            _category.Slug = createVM.Slug;
            _category.Description = createVM.Description;
            _context.Add(_category);
            _context.SaveChanges();
        }

        public void Update(UpdateViewModel updateVM)
        {
            _category.Id = updateVM.Id;
            _category.Name = updateVM.Name;
            _category.Slug = updateVM.Slug;
            _category.Description = updateVM.Description;
            
            _context.Entry(_category).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Category entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}