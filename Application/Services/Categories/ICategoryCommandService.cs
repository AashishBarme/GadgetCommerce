using System;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;

namespace GadgetCommerce_v2.Application.Services.Categories
{
    public interface ICategoryCommandService
    {
        void Create(CreateViewModel createVM);
        // void Update();
        // void Delete();
    }
}