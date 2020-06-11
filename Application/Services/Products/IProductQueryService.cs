using System;
using System.Collections.Generic;

namespace GadgetCommerce_v2.Application.Services.Products
{
    public interface IProductQueryService<T> where T : class
    {
        IEnumerable<T> ListWithCategoryName();
        T GetById(int id);

    }
}