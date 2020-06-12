using System;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;

namespace GadgetCommerce_v2.Application.Services.Categories
{
    public interface ICategoryCommandService
    {
        void Create(CategoryCreateVM createVM);
        void Update(CategoryUpdateVM updateVM);
        void Delete(Category entity);
    }
}