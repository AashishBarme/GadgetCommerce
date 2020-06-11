using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Data;
using Microsoft.EntityFrameworkCore;

namespace GadgetCommerce_v2.Application.Services.Admins
{
    public class AdminCommandService : IAdminCommandService<Admin>
    {
        protected readonly ApplicationDbContext _context;
        public AdminCommandService(ApplicationDbContext context)
        {
            _context = context;
        }
         public void Create(Admin entity)
        {
            _context.Add(entity);
            _context.SaveChanges();
        }

        public void Update(Admin entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Admin entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
       
    }
}