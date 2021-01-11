using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Web;

namespace GadgetCommerce.Application.Helpers
{
    public class Helpers
    {
        public string Slugify(string title)
        {
            if (string.IsNullOrEmpty(title))
            {
                return "na";
            }
            title = title.Replace(" ","-");
            string slug = title.ToLower();
            return slug;
        }

    }
}