using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Interfaces
{
    public interface ICategoryService : IService<Category>
    {
        IEnumerable<Category> List();
    }
}