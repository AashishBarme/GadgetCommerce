using System;
using System.Collections.Generic;

namespace GadgetCommerce_v2.Application.Services.Customers
{
    public interface ICustomerQueryService<T> where T: class
    {
        IEnumerable<T> List();
        T GetById(int id);
    }
}