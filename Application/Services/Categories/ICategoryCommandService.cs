using System;
using GadgetCommerce.Application.Domain;
using GadgetCommerce.Application.Services.Categories.ViewModel;

namespace GadgetCommerce.Application.Services.Categories
{
    public interface ICategoryCommandService
    {
        void Create(CategoryCreateVM createVM);
        void Update(CategoryUpdateVM updateVM);
        void Delete(Category entity);
    }
}