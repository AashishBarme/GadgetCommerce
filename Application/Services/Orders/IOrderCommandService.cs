using System;

namespace GadgetCommerce_v2.Application.Services.Orders
{
    public interface IOrderCommandService<T> where T: class
    {
         void Create(T entity);
         void Update(T entity);
         void Delete(T entity);

    }
}