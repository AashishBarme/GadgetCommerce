namespace GadgetCommerce_v2.Application.Services.Customers
{
    public interface ICustomerCommandService<T>
    {
        void Create(T Entity);
        void Update(T Entity);
        void Delete(T Entity);
    }
}