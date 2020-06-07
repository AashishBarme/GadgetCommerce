using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;

namespace GadgetCommerce_v2.Controllers
{
    public class CustomerController : Controller 
    {
        private readonly ICustomerService _customerService;
        public CustomerController(ICustomerService customerService)
        {
                _customerService = customerService;
        }

        [Route("Customer")]
        public IActionResult List()
        {
            var customers = _customerService.List();
            if(customers.Count() == 0 ) return View("Empty");

            return View(customers);
            
        }
    }
}