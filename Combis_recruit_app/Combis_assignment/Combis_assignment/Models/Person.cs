using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Combis_assignment.Models {
    public class Person {
        public string Name { get; set; }
        public string Surname { get; set; }
        public string ZipCode { get; set; }
        public string City { get; set; }
        public string Mobile { get; set; }

        public static List<Person> personsList;
    }

}