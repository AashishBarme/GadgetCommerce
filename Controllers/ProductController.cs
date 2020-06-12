using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.IO;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;

using GadgetCommerce_v2.Application.Helpers;
using Microsoft.AspNetCore.Hosting;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Services.Products;
using GadgetCommerce_v2.Application.Services.Categories;
using GadgetCommerce_v2.Application.Services.Products.ViewModel;

namespace GadgetCommerce_v2.Controllers
{
    public class ProductController : Controller
    {
        private readonly ICategoryQueryService _categoryService;
        private readonly IWebHostEnvironment _hostEnvironment;
        private readonly IProductCommandService _command;
        private readonly IProductQueryService _query;
        private Helpers _helpers;
        public ProductController(
            ICategoryQueryService categoryService,
            IWebHostEnvironment hostEnvironment,
            IProductCommandService commandService,
            IProductQueryService queryService)
        {
            _categoryService = categoryService;
            _hostEnvironment = hostEnvironment;
            _command = commandService;
            _query = queryService;
            _helpers = new Helpers();
        }

        [Route("Product")]
        public IActionResult List()
        {
            var Products = _query.ListWithCategoryName();
            var ListVM = new List<ProductListVM>();

            if(Products.Count() == 0 ) return View("Empty");

            foreach (Product Product in Products)
            {
                ListVM.Add( new ProductListVM()
                {
                    Id = Product.Id,
                    ProductName = Product.ProductName,
                    ProductSlug = Product.ProductSlug,
                    ProductPrice = Product.ProductPrice,
                    ProductSku = Product.ProductSku,
                    ProductImage = Product.ProductImage,
                    CategoryName = Product.Category.Name
                });
            }
            return View(ListVM);
        }

        public IActionResult Create()
        {
            var productVM = new ProductCreateVM()
            {
                Categories = _categoryService.List()
            };
            return View(productVM);
        }
        [HttpPost]
        public async Task<IActionResult> Create(ProductCreateVM createVM, IFormFile file)
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
                createVM.ProductImage = fileName; 
            }    

            createVM.ProductSlug = _helpers.Slugify(createVM.ProductName);

            _command.Create(createVM);
            return RedirectToAction("List");
        }

        public IActionResult Update(int id , ProductUpdateVM updateVM)
        {
           var product = _query.GetById(id);
            updateVM.ProductImage = product.ProductImage;
            updateVM.ProductName = product.ProductName;
            updateVM.ProductPrice = product.ProductPrice;
            updateVM.ProductSku = product.ProductSku;
            updateVM.ProductSlug = product.ProductSlug;
            updateVM.CategoryId = product.CategoryId;
            updateVM.Categories = _categoryService.List();
           return View(updateVM);
        }
        [HttpPost]
        public async Task<IActionResult> Update(ProductUpdateVM updateVM, IFormFile file, string productImage)
        {   
            updateVM.ProductImage = productImage;
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
                updateVM.ProductImage = fileName; 
            } 
            
            _command.Update(updateVM);
            return RedirectToAction("List");
        }

        public IActionResult Delete(int id)
        {
            var product = _query.GetById(id);
            if(product.ProductImage != null )
            {
                var imagePath = Path.Combine(_hostEnvironment.WebRootPath,"image",product.ProductImage);
                if(System.IO.File.Exists(imagePath))
                {
                    System.IO.File.Delete(imagePath);
                }
            }
            _command.Delete(product);
            return RedirectToAction("List");
        }
    }
}