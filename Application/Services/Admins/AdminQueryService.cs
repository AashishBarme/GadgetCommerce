using System.Collections.Generic;
using GadgetCommerce.Data;
using GadgetCommerce.Application.Domain;

namespace GadgetCommerce.Application.Services.Admins
{
    public class AdminQueryService : IAdminQueryService
    {
        protected readonly ApplicationDbContext _context;
        public AdminQueryService(ApplicationDbContext context)
        {
            _context = context;
        }
          public Admin GetById(int id)
        {
            return _context.Set<Admin>().Find(id);
        }

        public IEnumerable<Admin> List()
        {
            return _context.Set<Admin>();
        }
        
    }
}