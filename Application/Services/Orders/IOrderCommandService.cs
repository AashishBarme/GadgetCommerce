using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Domain;
using GadgetCommerce.Application.Services.Orders.ViewModel;
namespace GadgetCommerce.Application.Services.Orders
{
    public interface IOrderCommandService
    {
         void Update(OrderUpdateVM updateVM);
         void Delete(Order entity);

    }
}