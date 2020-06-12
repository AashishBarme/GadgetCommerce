using GadgetCommerce_v2.Application.Services.Customers.ViewModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Application.Services.Customers
{
    public interface ICustomerCommandService
    {
        void Create(CustomerCreateVM createVM);
        void Update(CustomerUpdateVM updateVM);
        void Delete(Customer Entity);
    }
}