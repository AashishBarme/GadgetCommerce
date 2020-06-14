using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
namespace GadgetCommerce_v2.Application.Domain
{
    public class Admin
    {
        public int Id { get; set; }
        [Required]
        public string Username {get; set;}
        [RegularExpression(@"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$",ErrorMessage = "Please choose strong password")]
        public string Password { get; set; }
        public string UserRole  { get; set; }
        [Required]
        [DataType(DataType.EmailAddress)]
        [EmailAddress]
        public string Email {get; set;}
        public string FirstName {get; set;}
        public string LastName {get; set;}
        public string  LastLogin {get;set;} 
        public string LastLoginIpAddress{get; set;}

    }
}