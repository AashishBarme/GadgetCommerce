using System;
using System.Collections.Generic;
namespace GadgetCommerce_v2.Application.Interfaces
{
    public interface IService<T> where T: class
    {
        void Create(T Entity);
        void Update(T Entity);
        void Delete(T Entity);
        IEnumerable<T> List();
        T GetById(int id);



    } 
}