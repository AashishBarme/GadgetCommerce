using System;
using System.Collections.Generic;
namespace GadgetCommerce_v2.Application.Services.Categories
{
    public interface ICategoryQueryService<T> where T : class
    {
        IEnumerable<T> List();
        T GetById(int id);
    }
}