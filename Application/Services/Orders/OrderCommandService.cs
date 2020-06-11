using System;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
namespace GadgetCommerce_v2.Application.Services.Orders
{
    public class OrderCommandService : IOrderCommandService<Order>
    {
        
        protected readonly ApplicationDbContext _context;
        public OrderCommandService(ApplicationDbContext context)
        {
            _context = context;
        }
         public void Create(Order entity)
        {
            _context.Add(entity);
            _context.SaveChanges();
        }

        public void Update(Order entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Order entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}