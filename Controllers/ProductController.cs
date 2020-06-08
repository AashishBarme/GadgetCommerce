using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Application.Helpers;
using GadgetCommerce_v2.ViewModel;

namespace GadgetCommerce_v2.Controllers
{
    public class ProductController : Controller
    {
        private readonly IProductService _productService;
        private readonly ICategoryService _categoryService;
        private Helpers _helpers;
        public ProductController(IProductService productService, ICategoryService categoryService)
        {
            _productService = productService;
            _categoryService = categoryService;
            _helpers = new Helpers();
        }

        [Route("Product")]
        public IActionResult List()
        {
            var productVM = new List <ProductViewModel>();
            var products = _productService.List();
            if(products.Count() == 0 ) return View("Empty");
            
            foreach(var product in products)
            {
                productVM.Add(new ProductViewModel{
                    Product = product,
                    CategoryName = _categoryService.GetCategoryName(product.CategoryId)
                });
            }
            return View(productVM);
        }

        public IActionResult Create()
        {
            var productVM = new ProductViewModel()
            {
                Categories = _categoryService.List()
            };
            return View(productVM);
        }
        [HttpPost]
        public IActionResult Create(ProductViewModel productViewModel)
        {
            productViewModel.Product.ProductSlug = _helpers.Slugify(productViewModel.Product.ProductName);

            _productService.Create(productViewModel.Product);
            return RedirectToAction("List");
        }

        public IActionResult Update(int id)
        {
            var productVM = new ProductViewModel()
            {
                Product = _productService.GetById(id),
                Categories = _categoryService.List()
            };
            return View(productVM);
        }
        [HttpPost]
        public IActionResult Update(ProductViewModel productViewModel)
        {   
            _productService.Update(productViewModel.Product);
            return RedirectToAction("List");
        }
    }
}