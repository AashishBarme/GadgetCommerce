using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Services.Admins.ViewModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Admins
{
    public interface IAdminQueryService
    {   
        IEnumerable<Admin> List();
        Admin GetById(int id);
    }
}