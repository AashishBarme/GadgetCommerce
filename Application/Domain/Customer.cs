using System;
namespace GadgetCommerce_v2.Application.Domain
{
    public class Customer
    {
       public int Id { get; set; } 
       public string FirstName { get; set; }
       public string LastName { get; set;}
       public string UserName {get;  set;}
       public string Password {get;  set;}
       public string LastLogin {get;  set;}
       public string LastLoginIpAddress {get;  set;}
    }
}
