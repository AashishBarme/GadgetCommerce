using System.Collections.Generic;
using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Services.Admins
{
    public class AdminQueryService : IAdminQueryService<Admin>
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