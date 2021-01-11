using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Services.Admins.ViewModel;
using GadgetCommerce.Application.Domain;

namespace GadgetCommerce.Application.Services.Admins
{
   public interface IAdminCommandService
    {
        void Create(AdminCreateVM Entity);
        void Update(AdminUpdateVM Entity);
        void Delete(Admin Entity);
    }
}