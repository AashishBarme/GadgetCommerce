using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
namespace GadgetCommerce_v2.Application.Services.Products
{
    public class ProductCommandService : IProductCommandService<Product>
    {
        private readonly ApplicationDbContext _context;
        public ProductCommandService(ApplicationDbContext context)
        {
            _context = context;
        }

         public void Create(Product entity)
        {
            _context.Add(entity);
            _context.SaveChanges();
        }

        public void Update(Product entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Product entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}