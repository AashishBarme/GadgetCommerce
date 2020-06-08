using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;

namespace GadgetCommerce_v2.Controllers
{
    public class OrdersController : Controller
    {
        private readonly IOrderService _orderService;
        public OrdersController(IOrderService orderService)
        {
            _orderService = orderService;
        }

        [Route("Orders")]
        public IActionResult List()
        {
            var orders = _orderService.ListWithCategoryAndProductName();
            if(orders.Count() == 0) return View("Empty");
            
            return View(orders);
        }
    }
}