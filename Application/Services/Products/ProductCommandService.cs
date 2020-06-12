using GadgetCommerce_v2.Data;
using GadgetCommerce_v2.Application.Domain;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce_v2.Application.Services.Products.ViewModel;
namespace GadgetCommerce_v2.Application.Services.Products
{
    public class ProductCommandService : IProductCommandService
    {
        private readonly ApplicationDbContext _context;
        private readonly Product _product;
        public ProductCommandService(ApplicationDbContext context)
        {
            _context = context;
            _product = new Product();
        }

         public void Create(ProductCreateVM createVM)
        {
            _product.ProductImage = createVM.ProductImage;
            _product.ProductName = createVM.ProductName;
            _product.ProductPrice = createVM.ProductPrice;
            _product.ProductSku = createVM.ProductSku;
            _product.ProductSlug = createVM.ProductSlug;
            _product.CategoryId = createVM.CategoryId;

            _context.Add(_product);
            _context.SaveChanges();
        }

        public void Update(ProductUpdateVM updateVM)
        {
            _product.Id = updateVM.Id;
            _product.ProductImage = updateVM.ProductImage;
            _product.ProductName = updateVM.ProductName;
            _product.ProductPrice = updateVM.ProductPrice;
            _product.ProductSku = updateVM.ProductSku;
            _product.ProductSlug = updateVM.ProductSlug;
            _product.CategoryId = updateVM.CategoryId;

            _context.Entry(_product).State = EntityState.Modified;
            _context.SaveChanges();
        }

        public void Delete(Product entity)
        {
            _context.Remove(entity);
            _context.SaveChanges();
        }
    }
}