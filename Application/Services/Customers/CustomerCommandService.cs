using System;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
namespace GadgetCommerce_v2.Application.Services.Customers
{
    public class CustomerCommandService : ICustomerCommandService<Customer>
    {
        protected readonly ApplicationDbContext _context;
        public CustomerCommandService(ApplicationDbContext context)
        {
            _context = context;
        }
         public void Create(Customer entity)
        {
            _context.Add(entity);
            _context.SaveChanges();
        }

        public void Update(Customer entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Customer entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        } 
    }
}