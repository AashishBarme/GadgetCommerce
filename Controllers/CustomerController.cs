using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Domain;
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
            var ListVM = new List<CustomerListVM>();
            if(customers.Count() == 0 ) return View("Empty");
            foreach (Customer customer in customers )
            {
                ListVM.Add( new CustomerListVM()
                {
                    Id = customer.Id,
                    UserName = customer.UserName,
                    LastLogin = customer.LastLogin,
                    LastLoginIpAddress = customer.LastLoginIpAddress
                });
            }

            return View(ListVM);
            
        }

        public IActionResult Create()
        {
             var customer = new CustomerCreateVM();
            return View(customer);
        }
        [HttpPost]
        public IActionResult Create(CustomerCreateVM createVM)
        {
            if (!ModelState.IsValid)
            {
                return View(createVM);
            }
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
            if (!ModelState.IsValid)
            {
                return View(updateVM);
            }
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