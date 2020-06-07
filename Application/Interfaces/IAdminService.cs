using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Interfaces
{
    public interface IAdminService : IService<Admin>
    {
        IEnumerable<Admin> ListActive(Func<Admin, bool> predicate);
    }
}