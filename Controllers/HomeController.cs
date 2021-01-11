using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using GadgetCommerce.Models;
using GadgetCommerce.Application.Services.Categories;
using GadgetCommerce.Application.Services.Products;
using GadgetCommerce.Application.Services.Customers;
using GadgetCommerce.Application.Services.Orders;
using GadgetCommerce.Application.ViewModel;
namespace GadgetCommerce.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;
        private readonly ICategoryQueryService _categoryService;
        private readonly ICustomerQueryService _customerService;
        private readonly IProductQueryService _productService;
        private readonly IOrderQueryService _orderService;

        public HomeController(
            ILogger<HomeController> logger,
            ICustomerQueryService customerQueryService,
            ICategoryQueryService categoryQueryService,
            IProductQueryService productQueryService,
            IOrderQueryService orderQueryService)
        {
            _logger = logger;
            _categoryService = categoryQueryService;
            _customerService = customerQueryService;
            _orderService = orderQueryService;
            _productService = productQueryService;
        }

        public IActionResult Index()
        {
            var HomeVM = new HomeViewModel()
            {
                TotalCategory = _categoryService.Count(),
                TotalCustomer = _customerService.Count(),
                TotalOrder = _orderService.Count(),
                TotalProduct = _productService.Count()
            };
            return View(HomeVM);
        }

        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
