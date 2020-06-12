using System;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Orders.ViewModel;
using Microsoft.EntityFrameworkCore;
namespace GadgetCommerce_v2.Application.Services.Orders
{
    public class OrderCommandService : IOrderCommandService
    {
        
        protected readonly ApplicationDbContext _context;
        protected readonly Order _order;
        public OrderCommandService(ApplicationDbContext context)
        {
            _context = context;
            _order = new Order();
        }

        public void Update(OrderUpdateVM updateVM)
        {
            _order.Id = updateVM.Id;
            _order.CustomerId = updateVM.CustomerId;
            _order.ProductId = updateVM.ProductId;
            _order.BillingAddress = updateVM.BillingAddress;
            _order.ShippingAddress = updateVM.ShippingAddress;
            _order.PaymentMethod = updateVM.PaymentMethod;
            _order.OrderStatus = updateVM.OrderStatus;

            _context.Entry(_order).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Order entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}