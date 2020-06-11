using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;

namespace GadgetCommerce_v2.Application.Services.Categories
{
    public class CategoryCommandService : ICategoryCommandService<Category>
    {
        protected readonly ApplicationDbContext _context;
        public CategoryCommandService(ApplicationDbContext context)
        {
            _context = context;
        }
         public void Create(Category entity)
        {
            _context.Add(entity);
            _context.SaveChanges();
        }

        public void Update(Category entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Category entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}