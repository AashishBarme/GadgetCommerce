using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Data;

namespace GadgetCommerce_v2.Application.Services
{
    public class CustomerService : Service<Customer> , ICustomerService
    {
        public CustomerService(ApplicationDbContext context) : base(context)
        {
            
        }

        public Customer GetNamePassword(int id)
        {
            return _context.Customer
                           .Where(a => a.Id == id )
                           .First();
        }
    }
}