namespace GadgetCommerce.Application.Services.Admins.ViewModel
{
    public class AdminUpdateVM
    {
         public int Id {get; set;}
        public string Username {get; set;}
        public string Password { get; set; }
        public string Email {get; set;}
        public string FirstName {get; set;}
        public string LastName {get; set;}  
    }
}