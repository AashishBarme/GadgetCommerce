using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Categories
{
    public interface ICategoryQueryService
    {
        IEnumerable<Category> List();
        Category GetById(int id);
        int Count();
    }
}