using System;
using System.Collections.Generic;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Products.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Products
{
    public interface IProductQueryService
    {
        IEnumerable<Product> ListWithCategoryName();
        Product GetById(int id);

    }
}