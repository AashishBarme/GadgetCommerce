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
    public class OrderService: Service<Orders>, IOrderService
    {
        public OrderService(ApplicationDbContext context) : base(context)
        {

        }

        public IEnumerable<Orders> ListWithCategoryAndProductName()
        {
            return _context.Orders
                           .Include(c => c.Customer)
                           .Include(c => c.Product)
                           .ToList();
        }

        public string DisplayOrderStatusValue(int id)
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
    }
}