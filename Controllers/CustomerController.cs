using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Services.Customers;
using GadgetCommerce_v2.Application.Services.Customers.ViewModel;

namespace GadgetCommerce_v2.Controllers
{
    public class CustomerController : Controller 
    {
        private readonly ICustomerCommandService _command;
        private readonly ICustomerQueryService _query;
        public CustomerController(ICustomerQueryService queryService, ICustomerCommandService commandService)
        {
                _command = commandService;
                _query = queryService;
        }

        [Route("Customer")]
        public IActionResult List()
        {
            var customers = _query.List();
            if(customers.Count() == 0 ) return View("Empty");

            return View(customers);
            
        }

        public IActionResult Create()
        {
             var customer = new CustomerCreateVM();
            return View(customer);
        }
        [HttpPost]
        public IActionResult Create(CustomerCreateVM createVM)
        {
            _command.Create(createVM);
            return RedirectToAction("List");
        }


        public IActionResult Update(int id)
        {
             var customer = _query.GetById(id);
            return View(customer);
        }
        [HttpPost]
        public IActionResult Update(CustomerUpdateVM updateVM)
        {
            _command.Update(updateVM);
            return RedirectToAction("List");
        }
        
        public IActionResult Delete(int id)
        {
            var customer = _query.GetById(id);
            _command.Delete(customer);
            return RedirectToAction("List");
        }
    }
}