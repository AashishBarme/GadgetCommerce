using System;
using System.Linq;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce.Application.Domain;


namespace GadgetCommerce.Data
{
    public class ApplicationDbContext : DbContext
    {
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options)
        {

        }
        public DbSet<Admin> Admin {get; set;}
        public DbSet<Cart> Cart {get; set;}
        public DbSet<Category> Category {get; set;}
        public DbSet<Customer> Customer {get; set;}
        public DbSet<Order> Orders {get; set;}
        public DbSet<Product> Product {get;set;}


    }
}