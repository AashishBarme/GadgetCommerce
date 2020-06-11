using System;
using System.Collections.Generic;
namespace GadgetCommerce_v2.Application.Services.Admins
{
    interface IAdminQueryService<T> where T : class
    {   
        IEnumerable<T> List();
        T GetById(int id);
    }
}