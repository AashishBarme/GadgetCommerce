using GadgetCommerce_v2.Application.Services.Products.ViewModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Products
{
    public interface IProductCommandService
    {
        void Create(ProductCreateVM createVM);
         void Update(ProductUpdateVM updateVM);
         void Delete(Product entity);
    }
}