using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Application.Domain;


namespace GadgetCommerce_v2.Controllers
{
    public class AdminController : Controller
    {
        private readonly IAdminService _adminService;
        public AdminController(IAdminService adminService)
        {
            _adminService = adminService;
        }
        [Route("Admin")]
        public IActionResult List()
        {
            var members = _adminService.List();
            if(members.Count() == 0) return View("Empty");

            return View(members);
        }

        public IActionResult Delete(int id)
        {
            var member = _adminService.GetById(id);
            _adminService.Delete(member);

            return RedirectToAction("List");
        }

        public IActionResult Create()
        {
            var admin = new Admin();
            return View(admin);
        }
        
        [HttpPost]
        public IActionResult Create(Admin entity)
        {
            entity.LastLogin = "test";
            entity.LastLoginIpAddress = "test";
             _adminService.Create(entity);
             return RedirectToAction("List");
        }

         public IActionResult Update(int id)
        {
            var admin = _adminService.GetById(id);
            return View(admin);
        }
        
        [HttpPost]
        public IActionResult Update(Admin entity)
        {
             _adminService.Update(entity);
             return RedirectToAction("List");
        }
    }
}