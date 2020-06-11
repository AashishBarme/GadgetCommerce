using System;
using System.Collections.Generic;
namespace GadgetCommerce_v2.Application.Services.Orders
{
    public interface IOrderQueryService<T> where T: class
    {
        IEnumerable<T> ListWithProductAndCategoryName();
        T GetById(int id);
        string GetOrderStatusValue(int id);
         
    }
}