using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.ViewModel;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Controllers
{
    public class OrdersController : Controller
    {
        private readonly IOrderService _orderService;
        private readonly IProductService __productService;
        private readonly ICustomerService _customerService;
        public OrdersController(
            IOrderService orderService ,
            IProductService productService ,
            ICustomerService customerService)
        {
            _orderService = orderService;
            _customerService = customerService;
            __productService = productService;
        }

        [Route("Orders")]
        public IActionResult List()
        {
            var orders = _orderService.ListWithCategoryAndProductName();
            var OrderVM = new List<OrdersViewModel>();

            if(orders.Count() == 0) return View("Empty");
            foreach (Orders order in orders)
            {
                OrderVM.Add(new OrdersViewModel()
                {
                    Order = order,
                    OrderStatusValue = _orderService.DisplayOrderStatusValue(order.OrderStatus)
                });
            }
            return View(OrderVM);
        }

        public IActionResult Delete(int id)
        {
            var order = _orderService.GetById(id);
            _orderService.Delete(order);

            return RedirectToAction("List");
        }

        public IActionResult Update(int id)
        {
            var order = _orderService.GetById(id);     

            var orderVM = new OrdersViewModel()
            {
                Order = _orderService.GetById(id),
                Product = __productService.GetById(order.ProductId),
                Customer = _customerService.GetById(order.CustomerId)

            };

            return View(orderVM);
        }
        [HttpPost]
        public IActionResult Update(OrdersViewModel ordersViewModel)
        {
            _orderService.Update(ordersViewModel.Order);
            return RedirectToAction("List");
        }
        
    }
}