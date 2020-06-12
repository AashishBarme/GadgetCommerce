using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Orders
{
    public interface IOrderQueryService
    {
        IEnumerable<Order> ListWithCategoryAndProductName();
        Order GetById(int id);
        string GetOrderStatusValue(int id);
        
    }
}