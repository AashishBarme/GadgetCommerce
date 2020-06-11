using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using System.Collections.Generic;
using System.Linq;
using Microsoft.EntityFrameworkCore;
namespace GadgetCommerce_v2.Application.Services.Products
{
    public class ProductQueryService : IProductQueryService<Product>
    {
        private readonly ApplicationDbContext _context;
        public ProductQueryService(ApplicationDbContext context)
        {
            _context = context;
        }

        public IEnumerable<Product> ListWithCategoryName()
        {
            return _context.Product
                           .Include(c => c.Category)
                           .ToList();
        }

        public Product GetById(int id)
        {
            return _context.Product.Find(id);
        }
    }
}