using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.IO;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Application.Helpers;
using GadgetCommerce_v2.ViewModel;
using Microsoft.AspNetCore.Hosting;

namespace GadgetCommerce_v2.Controllers
{
    public class ProductController : Controller
    {
        private readonly IProductService _productService;
        private readonly ICategoryService _categoryService;
        private readonly IWebHostEnvironment _hostEnvironment;
        private Helpers _helpers;
        public ProductController(
            IProductService productService, 
            ICategoryService categoryService,
            IWebHostEnvironment hostEnvironment)
        {
            _productService = productService;
            _categoryService = categoryService;
            _hostEnvironment = hostEnvironment;
            _helpers = new Helpers();
        }

        [Route("Product")]
        public IActionResult List()
        {
            var productList = _productService.ListWithCategoryName();
            return View(productList);
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
        public async Task<IActionResult> Create(ProductViewModel productViewModel, IFormFile file)
        {
            if(file.Length > 0)
            {
               string wwwRootPath = _hostEnvironment.WebRootPath;
               string fileName = Path.GetFileNameWithoutExtension(file.FileName);
               string extension = Path.GetExtension(file.FileName);
               fileName =  fileName + DateTime.Now.ToString("yymmssff") + extension;
               string path = Path.Combine(wwwRootPath + "/image/", fileName);
               using (var fileStream = new FileStream(path, FileMode.Create))
               {
                   await file.CopyToAsync(fileStream);
               }
                productViewModel.Product.ProductImage = fileName; 
            }    
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
        public async Task<IActionResult> Update(ProductViewModel productViewModel, IFormFile file, string productImage)
        {   
            productViewModel.Product.ProductImage = productImage;
            if(file != null)
            {
               string wwwRootPath = _hostEnvironment.WebRootPath;
               string fileName = Path.GetFileNameWithoutExtension(file.FileName);
               string extension = Path.GetExtension(file.FileName);
               fileName =  fileName + DateTime.Now.ToString("yymmssff") + extension;
               string path = Path.Combine(wwwRootPath + "/image/", fileName);
               using (var fileStream = new FileStream(path, FileMode.Create))
               {
                   await file.CopyToAsync(fileStream);
               }
                productViewModel.Product.ProductImage = fileName; 
            } 
            
            _productService.Update(productViewModel.Product);
            return RedirectToAction("List");
        }

        public IActionResult Delete(int id)
        {
            var product = _productService.GetById(id);
            if(product.ProductImage != null )
            {
                var imagePath = Path.Combine(_hostEnvironment.WebRootPath,"image",product.ProductImage);
                if(System.IO.File.Exists(imagePath))
                {
                    System.IO.File.Delete(imagePath);
                }
            }
            _productService.Delete(product);
            return RedirectToAction("List");
        }
    }
}