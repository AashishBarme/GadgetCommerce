using System;
using System.Collections.Generic;
namespace GadgetCommerce_v2.Application.Services.Admins
{
    interface IAdminCommandService<T> where T : class
    {
        void Create(T Entity);
        void Update(T Entity);
        void Delete(T Entity);
    }
}