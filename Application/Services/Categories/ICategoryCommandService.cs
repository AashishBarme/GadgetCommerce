namespace GadgetCommerce_v2.Application.Services.Categories
{
    interface ICategoryCommandService<T>
    {
        void Create(T Entity);
        void Update(T Entity);
        void Delete(T Entity);
    }
}