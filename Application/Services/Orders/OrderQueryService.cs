using System;
using System.Linq;
using System.Collections.Generic;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;

namespace GadgetCommerce_v2.Application.Services.Orders
{
    public class OrderQueryService : IOrderQueryService
    {
        protected readonly ApplicationDbContext _context;
        public OrderQueryService(ApplicationDbContext context)
        {
            _context = context;
        }
        public IEnumerable<Order> ListWithCategoryAndProductName()
        {
            return _context.Orders
                           .Include(c => c.Customer)
                           .Include(c => c.Product)
                           .ToList();
        }

        public Order GetById(int id)
        {
            return _context.Set<Order>().Find(id);
        }
        public string GetOrderStatusValue(int id)
        {
            int orderStatus = id ;
            string status;
            switch (orderStatus)
            {
                case 0:
                    status =  "Pending";
                    break;
                case 1:
                    status =  "Completed";
                    break;   
                default:
                    status = "N/A";
                    break;
            }
            return status;
        }

         public int Count()
        {
            return _context.Set<Order>().Where(x => true).Count();
        }
    }
}