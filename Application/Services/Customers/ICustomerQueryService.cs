using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Customers
{
    public interface ICustomerQueryService
    {
        IEnumerable<Customer> List();
        Customer GetById(int id);
        int Count();
    }
}