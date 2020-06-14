using System;
using System.ComponentModel.DataAnnotations;
namespace GadgetCommerce_v2.Application.Domain
{
    public class Customer
    {
       public int Id { get; set; } 
       [Required, MinLength(2), MaxLength(50)]
       public string FirstName { get; set; }
       [Required, MinLength(3), MaxLength(50)]
       public string LastName { get; set;}
       [Required, MinLength(3), MaxLength(50)]
       public string UserName {get;  set;}
       [RegularExpression(@"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$",ErrorMessage = "Please choose strong password")]
       public string Password {get;  set;}
       public string LastLogin {get;  set;}
       public string LastLoginIpAddress {get;  set;}
    }
}
