using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using GadgetCommerce_v2.Application.Interfaces;
using GadgetCommerce_v2.Data;

namespace GadgetCommerce_v2.Application.Services
{
    public class Service<T> : IService<T> where T : class
    {
        protected readonly ApplicationDbContext _context;
        public Service(ApplicationDbContext context)
        {
            _context = context;
        }

        protected void Save() => _context.SaveChanges();
        
        public void Create(T entity)
        {
            _context.Add(entity);
            Save();
        }

        public void Update(T entity)
        {
            _context.Entry(entity).State = EntityState.Modified;
            Save();
        }

        public void Delete(T entity)
        {
            _context.Remove(entity);
            Save();
        }

        public T GetById(int id)
        {
            return _context.Set<T>().Find(id);
        }

        public IEnumerable<T> List()
        {
            return _context.Set<T>();
        }
    }
}