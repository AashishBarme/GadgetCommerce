namespace GadgetCommerce_v2.Application.Services.Products
{
    public interface IProductCommandService<T> where T : class
    {
        void Create(T entity);
         void Update(T entity);
         void Delete(T entity);
    }
}