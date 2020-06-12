using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Admins;
using GadgetCommerce_v2.Application.Services.Admins.ViewModel;

namespace GadgetCommerce_v2.Controllers
{
    public class AdminController : Controller
    {
        private readonly IAdminCommandService _command;
        private readonly IAdminQueryService _query;
        public AdminController(IAdminCommandService commandService , IAdminQueryService queryService)
        {
            _command  = commandService;
            _query = queryService;
        }
        [Route("Admin")]
        public IActionResult List()
        {
            var Admins = _query.List();
            var ListVM = new List<AdminListVM>();
            if(Admins.Count() == 0) return View("Empty");

            foreach (Admin admin in Admins)
            {
                ListVM.Add(new AdminListVM()
                {
                    Id = admin.Id,
                    Username = admin.Username,
                    Email = admin.Email,
                    LastLogin = admin.LastLogin,
                    LastLoginIpAddress = admin.LastLoginIpAddress
                });
            }
            return View(ListVM);
        }

        public IActionResult Delete(int id)
        {
            var member = _query.GetById(id);
            _command.Delete(member);

            return RedirectToAction("List");
        }

        public IActionResult Create()
        {
            var admin = new AdminCreateVM();
            return View(admin);
        }
        
        [HttpPost]
        public IActionResult Create(AdminCreateVM createVM)
        {
             _command.Create(createVM);
             return RedirectToAction("List");
        }

         public IActionResult Update(int id , AdminUpdateVM updateVM)
        {
            var admin = _query.GetById(id);
            updateVM.Id = admin.Id;
            updateVM.FirstName = admin.FirstName;
            updateVM.LastName = admin.LastName;
            updateVM.Username = admin.Username;
            updateVM.Password = admin.Password;
            updateVM.Email = admin.Email;
            return View(updateVM);
        }
        
        [HttpPost]
        public IActionResult Update(AdminUpdateVM updateVM)
        {
             _command.Update(updateVM);
             return RedirectToAction("List");
        }
    }
}