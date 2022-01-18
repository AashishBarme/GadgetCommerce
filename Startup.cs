using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.HttpsPolicy;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;
using Microsoft.EntityFrameworkCore;
using GadgetCommerce.Data;
using GadgetCommerce.Application.Services.Categories;
using GadgetCommerce.Application.Services.Customers;
using GadgetCommerce.Application.Services.Products;
using GadgetCommerce.Application.Services.Orders;
using GadgetCommerce.Application.Services.Admins;

namespace GadgetCommerce
{
    public class Startup
    {
        public Startup(IConfiguration configuration)
        {
            Configuration = configuration;
        }

        public IConfiguration Configuration { get; }

        // This method gets called by the runtime. Use this method to add services to the container.
        public void ConfigureServices(IServiceCollection services)
        {
           
                
            services.AddDbContext<ApplicationDbContext>(options =>
            {
                options.UseMySql(Configuration.GetConnectionString("DefaultConnection"));
            });
            // options.UseMySql("Server=localhost;Database=GadgetCommerce;UserId=admin;Password=admin;"));
            services.AddTransient<ICategoryCommandService, CategoryCommandService>();
            services.AddTransient<ICategoryQueryService, CategoryQueryService>();
            services.AddTransient<ICustomerCommandService, CustomerCommandService>();
            services.AddTransient<ICustomerQueryService, CustomerQueryService>();
            services.AddTransient<IProductCommandService, ProductCommandService>();
            services.AddTransient<IProductQueryService, ProductQueryService>();
            services.AddTransient<IOrderCommandService, OrderCommandService>();
            services.AddTransient<IOrderQueryService, OrderQueryService>();
            services.AddTransient<IAdminCommandService, AdminCommandService>();
            services.AddTransient<IAdminQueryService, AdminQueryService>();


            services.AddControllersWithViews();

        }

        // This method gets called by the runtime. Use this method to configure the HTTP request pipeline.
        public void Configure(IApplicationBuilder app, IWebHostEnvironment env)
        {
            if (env.IsDevelopment())
            {
                app.UseDeveloperExceptionPage();
            }
            else
            {
                app.UseExceptionHandler("/Home/Error");
                // The default HSTS value is 30 days. You may want to change this for production scenarios, see https://aka.ms/aspnetcore-hsts.
                app.UseHsts();
            }
            app.UseHttpsRedirection();
            app.UseStaticFiles();

            app.UseRouting();

            app.UseAuthorization();

            app.UseEndpoints(endpoints =>
            {
                endpoints.MapControllerRoute(
                    name: "default",
                    pattern: "{controller=Home}/{action=Index}/{id?}");
            });
        }
    }
}
