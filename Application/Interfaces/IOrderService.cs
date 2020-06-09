using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Application.Interfaces
{
    public interface IOrderService : IService<Orders>
    {
         IEnumerable<Orders> ListWithCategoryAndProductName();

         string DisplayOrderStatusValue(int id);
    }
}