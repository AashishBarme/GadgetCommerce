using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Application.Domain;
using GadgetCommerce_v2.Application.Helpers;

namespace GadgetCommerce_v2.Controllers
{
    public class CategoryController : Controller
    {
        private readonly ICategoryService _categoryService;
        private Helpers _helpers;

        public CategoryController(ICategoryService categoryService)
        {
            _categoryService = categoryService;
            _helpers = new Helpers();
        }
        [Route("Category")]
        public IActionResult List()
        {
            var categories = _categoryService.List();
            if(categories.Count() == 0 ) return View("Empty");
            return View(categories);
        }

        public IActionResult Create()
        {
            var category = new Category();
            return View(category);
        }
        [HttpPost]
        public IActionResult Create(Category entity)
        {
            entity.Slug = _helpers.Slugify(entity.Name);

            _categoryService.Create(entity);
            return RedirectToAction("List");
        }


        public IActionResult Update(int id)
        {
            var category = _categoryService.GetById(id);
            return View(category);
        }
        [HttpPost]
        public IActionResult Update(Category entity)
        {
            _categoryService.Update(entity);
            return RedirectToAction("List");
        }

        public IActionResult Delete(int id)
        {
            var category = _categoryService.GetById(id);
            _categoryService.Delete(category);
            return RedirectToAction("List");
        }
    }
}