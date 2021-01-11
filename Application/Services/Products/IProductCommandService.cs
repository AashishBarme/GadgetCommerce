using GadgetCommerce.Application.Services.Products.ViewModel;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Products
{
    public interface IProductCommandService
    {
        void Create(ProductCreateVM createVM);
         void Update(ProductUpdateVM updateVM);
         void Delete(Product entity);
    }
}