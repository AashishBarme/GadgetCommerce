using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Services.Categories.ViewModel;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Categories
{
    public interface ICategoryQueryService
    {
        IEnumerable<Category> List();
        Category GetById(int id);
        int Count();
    }
}