using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Data;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce_v2.Application.Services.Admins.ViewModel;


namespace GadgetCommerce_v2.Application.Services.Admins
{
    public class AdminCommandService : IAdminCommandService
    {
        protected readonly ApplicationDbContext _context;
        protected readonly Admin _admin;
        public AdminCommandService(ApplicationDbContext context)
        {
            _context = context;
            _admin = new Admin();
        }
         public void Create(AdminCreateVM createVM)
        {
            _admin.FirstName = createVM.FirstName;
            _admin.LastName = createVM.LastName;
            _admin.Username = createVM.Username;
            _admin.Password = createVM.Password;
            _admin.Email = createVM.Email;

            _context.Add(_admin);
            _context.SaveChanges();
        }

        public void Update(AdminUpdateVM updateVM)
        {
            _admin.Id = updateVM.Id;
            _admin.FirstName = updateVM.FirstName;
            _admin.LastName = updateVM.LastName;
            _admin.Username = updateVM.Username;
            _admin.Password = updateVM.Password;
            _admin.Email = updateVM.Email;

            _context.Entry(_admin).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Admin entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
       
    }
}