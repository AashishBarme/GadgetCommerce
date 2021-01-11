using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Orders
{
    public interface IOrderQueryService
    {
        IEnumerable<Order> ListWithCategoryAndProductName();
        Order GetById(int id);
        string GetOrderStatusValue(int id);
        int Count();
        
    }
}