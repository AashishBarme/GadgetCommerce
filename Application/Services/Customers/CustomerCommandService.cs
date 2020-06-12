using System;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce_v2.Application.Services.Customers.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Customers
{
    public class CustomerCommandService : ICustomerCommandService
    {
        protected readonly ApplicationDbContext _context;
        protected readonly Customer _customer;
        public CustomerCommandService(ApplicationDbContext context)
        {
            _context = context;
            _customer = new Customer();
        }
         public void Create(CustomerCreateVM createVM)
        {
            _customer.FirstName = createVM.FirstName;
            _customer.LastName = createVM.LastName;
            _customer.UserName = createVM.UserName;
            _customer.Password = createVM.Password;

            _context.Add(_customer);
            _context.SaveChanges();
        }

        public void Update(CustomerUpdateVM updateVM)
        {
            _customer.Id = updateVM.Id;
            _customer.FirstName = updateVM.FirstName;
            _customer.LastName = updateVM.LastName;
            _customer.UserName = updateVM.UserName;
            _customer.Password = updateVM.Password;

            _context.Entry(_customer).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Customer entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        } 
    }
}