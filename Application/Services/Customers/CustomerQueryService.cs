using GadgetCommerce.Data;
using GadgetCommerce.Application.Domain;
using System.Collections.Generic;
using System.Linq;
using Microsoft.EntityFrameworkCore;

namespace GadgetCommerce.Application.Services.Customers
{
    public class CustomerQueryService : ICustomerQueryService
    {
        protected readonly ApplicationDbContext _context;
        public CustomerQueryService(ApplicationDbContext context)
        {
            _context = context;
        }
          public Customer GetById(int id)
        {
            return _context.Set<Customer>().Find(id);
        }

        public IEnumerable<Customer> List()
        {
            return _context.Set<Customer>();
        }

         public int Count()
        {
            return _context.Customer.Where(x => true).Count();
        }
                          
    }
}