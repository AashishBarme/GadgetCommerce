using System;
using System.Linq;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce_v2.Application.Domain;

namespace GadgetCommerce_v2.Data
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
        public DbSet<Orders> Orders {get; set;}
        public DbSet<Product> Product {get;set;}
    }
}