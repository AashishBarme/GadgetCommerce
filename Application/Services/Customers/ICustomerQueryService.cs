using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Customers
{
    public interface ICustomerQueryService
    {
        IEnumerable<Customer> List();
        Customer GetById(int id);
    }
}