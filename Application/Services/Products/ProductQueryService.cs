using GadgetCommerce.Data;
using GadgetCommerce.Application.Domain;
using System.Collections.Generic;
using System.Linq;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce.Application.Services.Products.ViewModel;
namespace GadgetCommerce.Application.Services.Products
{
    public class ProductQueryService : IProductQueryService
    {
        private readonly ApplicationDbContext _context;
        public ProductQueryService(ApplicationDbContext context)
        {
            _context = context;
        }

        public IEnumerable<Product> ListWithCategoryName()
        {
            return _context.Product.Include(p => p.Category)
                                   .ToList();                   
        }

        public Product GetById(int id)
        {
            return _context.Product.Find(id);
        }

        public int Count()
        {
            return _context.Product.Where(x => true).Count();
        }
    }
}