using System;
using System.Collections.Generic;
using System.Linq;
using System.IO;
using System.Web;
using System.Web.Mvc;
using System.Data;
using System.Data.SqlClient;
using System.Net;
using Combis_assignment.Models;
using System.Configuration;
using System.Data.Entity.Infrastructure;

namespace Combis_assignment.Controllers
{
    public class ReadCsvFileController : Controller
    {
        // GET: ReadCsvFile

        //List<Person> personsList;
        public ActionResult Index()
        {   
            /*string path = @"D:\Bruno\Programiranje_posao\WebDiP\ASP.NET_MVC\Combis\Combis_assignment\Combis_assignment\Content\csv\podaci.csv";
            //StreamReader oStreamReader = new StreamReader(path);
            //DataTable oDataTable = new DataTable();
            //int rowCount = 0;
            string[] Lines = System.IO.File.ReadAllLines(path);
            string[] personDetailsArray;
            
            List<Person> personsList = new List<Person>();
            
            foreach (var line in Lines) {
                personDetailsArray = line.Split(';');
                personsList.Add(
                    new Person {
                        Name = personDetailsArray[0],
                        Surname = personDetailsArray[1],
                        ZipCode = personDetailsArray[2],
                        City = personDetailsArray[3],
                        Mobile = personDetailsArray[4]
                });
            }*/

            return View(/*personsList*/);
        }

        public ActionResult ReadCsvFileAction()
        {
            string path = ConfigurationManager.AppSettings["podaciCSV"];
            string[] Lines = System.IO.File.ReadAllLines(Server.MapPath(path));
            string[] personDetailsArray;

            Person.personsList = new List<Person>();
            foreach (var line in Lines) {
                personDetailsArray = line.Split(';');
                Person.personsList.Add(
                    new Person {
                        Name = personDetailsArray[0],
                        Surname = personDetailsArray[1],
                        ZipCode = personDetailsArray[2],
                        City = personDetailsArray[3],
                        Mobile = personDetailsArray[4]
                    });
            }
            return Json(Person.personsList, JsonRequestBehavior.AllowGet);
        }

        public ActionResult StoreCsvDataAction()
        {
            string[] messages = new string[Person.personsList.Count()];
            int i = 0;
            foreach (var listNode in Person.personsList) {
                using (var db = new combisDBEntities()) {
                    Podaci insertData = new Podaci {
                        ime = listNode.Name,
                        prezime = listNode.Surname,
                        postanski_broj = listNode.ZipCode,
                        grad = listNode.City,
                        telefon = listNode.Mobile
                    };
                    db.Podaci.Add(insertData);
                    try {
                        db.SaveChanges();
                        messages[i++] = "Row successfully inserted!";
                    }
                    catch (DbUpdateException exception) {
                        messages[i++] = exception.InnerException.InnerException.Message;
                    }
                    
                }
            }
            return Json(messages, JsonRequestBehavior.AllowGet);
        }
    }
}