using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Services.Admins.ViewModel;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Admins
{
    public interface IAdminQueryService
    {   
        IEnumerable<Admin> List();
        Admin GetById(int id);
    }
}