using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
namespace GadgetCommerce_v2.Controllers
{
    public class CategoryController : Controller
    {
        private readonly ICategoryService _categoryService;

        public CategoryController(ICategoryService categoryService)
        {
            _categoryService = categoryService;
        }
        [Route("Category")]
        public IActionResult List()
        {
            var categories = _categoryService.List();
            if(categories.Count() == 0 ) return View("Empty");
            return View(categories);
        }
    }
}