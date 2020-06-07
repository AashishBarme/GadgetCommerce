using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Interfaces
{
    public interface ICustomerService : IService<Customer>
    {
        IEnumerable<Customer> List();
        Customer GetNamePassword(int id);
    }
}