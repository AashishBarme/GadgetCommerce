using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace GadgetCommerce_v2.Application.Domain
{
    public class Admin
    {
        public int Id { get; set; }
        public string Username {get; set;}
        public string Password { get; set; }
        public string UserRole  { get; set; }
        public string Email {get; set;}
        public string FirstName {get; set;}
        public string LastName {get; set;}
        public string  LastLogin {get;set;} 
        public string LastLoginIpAddress{get; set;}

    }
}