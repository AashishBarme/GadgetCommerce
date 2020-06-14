using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Helpers;
using GadgetCommerce_v2.Application.Services.Categories;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;
using GadgetCommerce_v2.Application.Domain;
namespace GadgetCommerce_v2.Controllers
{
    public class CategoryController : Controller
    {
        private readonly ICategoryCommandService _command;
        private readonly ICategoryQueryService _query;
        private Helpers _helpers;

        public CategoryController(ICategoryCommandService commandService ,ICategoryQueryService queryService )
        {
            _command = commandService;
            _query = queryService;
            _helpers = new Helpers();
        }
        [Route("Category")]
        public IActionResult List()
        {
            var Categories = _query.List();
            var ListVM = new List<CategoryListVM>();
            if(Categories.Count() == 0 ) return View("Empty");

            foreach(Category category in Categories)
            {
                ListVM.Add( new CategoryListVM()
                {
                    Id = category.Id,
                    Name = category.Name,
                    Description = category.Description
                });
            }
            return View(ListVM);
        }

        public IActionResult Create()
        {
            var category = new CategoryCreateVM();
            return View(category);
        }
        [HttpPost]
        public IActionResult Create(CategoryCreateVM createVM)
        {
            if (!ModelState.IsValid)
            {
                return View(createVM);
            }
            createVM.Slug = _helpers.Slugify(createVM.Name);

            _command.Create(createVM);
            return RedirectToAction("List");
        }

         public IActionResult Update(int id , CategoryUpdateVM updateVM)
        {
            var category = _query.GetById(id);
            updateVM.Id = category.Id;
            updateVM.Name = category.Name;
            updateVM.Slug = category.Slug;
            updateVM.Description = category.Description;
            
            return View(updateVM);
        }
        [HttpPost]
        public IActionResult Update(CategoryUpdateVM updateVM)
        {
            if (!ModelState.IsValid)
            {
                return View(updateVM);
            }
            updateVM.Slug = _helpers.Slugify(updateVM.Name);

            _command.Update(updateVM);
            return RedirectToAction("List");
        }

        public IActionResult Delete(int id)
        {
            var category = _query.GetById(id);
            _command.Delete(category);
            return RedirectToAction("List");
        }
    }
}