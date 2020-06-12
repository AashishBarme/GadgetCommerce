using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Orders;
using GadgetCommerce_v2.Application.Services.Customers;
using GadgetCommerce_v2.Application.Services.Products;
using GadgetCommerce_v2.Application.Services.Orders.ViewModel;

namespace GadgetCommerce_v2.Controllers
{
    public class OrdersController : Controller
    {
        private readonly IProductQueryService __productService;
        private readonly ICustomerQueryService _customerService;
        private readonly IOrderCommandService _command;
        private readonly IOrderQueryService _query;
        public OrdersController(
            IProductQueryService productService ,
            ICustomerQueryService customerService,
            IOrderCommandService commandService,
            IOrderQueryService queryService)
        {
            _customerService = customerService;
            __productService = productService;
            _command = commandService;
            _query = queryService;
        }

        [Route("Orders")]
        public IActionResult List()
        {
            var orders = _query.ListWithCategoryAndProductName();
            var OrderVM = new List<OrderListVM>();

            if(orders.Count() == 0) return View("Empty");
            foreach (Order order in orders)
            {
                OrderVM.Add(new OrderListVM()
                {
                    Id = order.Id,
                    ProductName = order.Product.ProductName,
                    CustomerName = order.Customer.UserName,
                    ShippingAddress = order.ShippingAddress,
                    OrderStatus = _query.GetOrderStatusValue(order.OrderStatus)
                });
            }
            return View(OrderVM);
        }

        public IActionResult Delete(int id)
        {
            var order = _query.GetById(id);
            _command.Delete(order);

            return RedirectToAction("List");
        }

        public IActionResult Update(int id, OrderUpdateVM updateVM)
        {
            var order = _query.GetById(id);     
            updateVM.Id = order.Id;
            updateVM.ProductId = order.ProductId;
            updateVM.CustomerId = order.CustomerId;
            updateVM.ProductName = __productService.GetById(order.ProductId).ProductName;
            updateVM.CustomerName = _customerService.GetById(order.CustomerId).UserName;
            updateVM.BillingAddress = order.BillingAddress;
            updateVM.ShippingAddress = order.ShippingAddress;
            updateVM.PaymentMethod = order.PaymentMethod;
            updateVM.OrderStatus = order.OrderStatus;

            return View(updateVM);
        }
        [HttpPost]
        public IActionResult Update(OrderUpdateVM updateVM)
        {
            _command.Update(updateVM);
            return RedirectToAction("List");
        }
        
    }
}