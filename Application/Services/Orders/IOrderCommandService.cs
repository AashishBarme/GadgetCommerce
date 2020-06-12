using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Orders.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Orders
{
    public interface IOrderCommandService
    {
         void Update(OrderUpdateVM updateVM);
         void Delete(Order entity);

    }
}