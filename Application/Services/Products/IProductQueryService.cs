using System;
using System.Collections.Generic;
using GadgetCommerce.Application.Domain;
using GadgetCommerce.Application.Services.Products.ViewModel;
namespace GadgetCommerce.Application.Services.Products
{
    public interface IProductQueryService
    {
        IEnumerable<Product> ListWithCategoryName();
        Product GetById(int id);
        int Count();

    }
}