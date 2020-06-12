using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using GadgetCommerce_v2.Application.Helpers;
using GadgetCommerce_v2.Application.Services.Categories;
using GadgetCommerce_v2.Application.Services.Categories.ViewModel;
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
            var categories = _query.List();
            if(categories.Count() == 0 ) return View("Empty");
            return View(categories);
        }

        public IActionResult Create()
        {
            var category = new CreateViewModel();
            return View(category);
        }
        [HttpPost]
        public IActionResult Create(CreateViewModel createVM)
        {
            createVM.Slug = _helpers.Slugify(createVM.Name);

            _command.Create(createVM);
            return RedirectToAction("List");
        }

         public IActionResult Update(int id)
        {
             var category = _query.GetById(id);
            return View(category);
        }
        [HttpPost]
        public IActionResult Update(UpdateViewModel updateVM)
        {
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