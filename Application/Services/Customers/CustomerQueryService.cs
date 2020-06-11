using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using System.Collections.Generic;

namespace GadgetCommerce_v2.Application.Services.Customers
{
    public class CustomerQueryService : ICustomerQueryService<Customer>
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
    }
}