using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;

namespace GadgetCommerce_v2.Application.Helpers
{
    public class Helpers
    {
        public string Slugify(string title)
        {
            title = title.Replace(" ","-");
            string slug = title.ToLower();
            return slug;
        }

        public string ImageUploader()
        {
            return "Hello";
        }
    }
}