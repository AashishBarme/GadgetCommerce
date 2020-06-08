using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Data;
using Microsoft.EntityFrameworkCore;

namespace GadgetCommerce_v2.Application.Services
{
    public class ProductService : Service<Product> , IProductService
    {
        public ProductService(ApplicationDbContext context) : base(context)
        {
            
        }
        public IEnumerable<Product> ListWithCategoryName()
        {
                return _context.Product.Include(c => c.Category).ToList();
        }
    }
}