using GadgetCommerce.Application.Services.Customers.ViewModel;
using GadgetCommerce.Application.Domain;
namespace GadgetCommerce.Application.Services.Customers
{
    public interface ICustomerCommandService
    {
        void Create(CustomerCreateVM createVM);
        void Update(CustomerUpdateVM updateVM);
        void Delete(Customer Entity);
    }
}