using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Application.Domain;

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

        public IActionResult Create()
        {
             var customer = new Customer();
            return View(customer);
        }
        [HttpPost]
        public IActionResult Create(Customer customer)
        {
            _customerService.Create(customer);
            return RedirectToAction("List");
        }


        public IActionResult Update(int id)
        {
             var customer = _customerService.GetById(id);
            return View(customer);
        }
        [HttpPost]
        public IActionResult Update(Customer customer)
        {
            _customerService.Update(customer);
            return RedirectToAction("List");
        }
        
        public IActionResult Delete(int id)
        {
            var customer = _customerService.GetById(id);
            _customerService.Delete(customer);
            return RedirectToAction("List");
        }
    }
}