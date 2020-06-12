using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Services.Admins.ViewModel;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Services.Admins
{
   public interface IAdminCommandService
    {
        void Create(AdminCreateVM Entity);
        void Update(AdminUpdateVM Entity);
        void Delete(Admin Entity);
    }
}