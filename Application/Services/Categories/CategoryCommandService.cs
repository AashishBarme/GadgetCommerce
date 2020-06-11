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
        public CategoryCommandService(ApplicationDbContext context)
        {
            _context = context;
        }
         public void Create(CreateViewModel createVM)
        {
            _context.Add(createVM);
            _context.SaveChanges();
        }

        // public void Update(Category entity)
        // {
        //     _context.Entry(entity).State = EntityState.Modified;
        //     _context.SaveChanges();
        // }

        // public void Delete(Category entity)
        // {
        //     _context.Remove(entity);
        //     _context.SaveChanges();
        // }
    }
}