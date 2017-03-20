using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Combis_assignment.Controllers
{
    public class UploadFileController : Controller
    {
        // GET: UploadFile
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Process (HttpPostedFileBase postedFile)
        {
            var fileType = postedFile.ContentType.ToLower();
            
            if (fileType == "text/css" || fileType == "application/vnd.ms-excel" || fileType == "application/excel" || fileType == "application/x-msexcel" || fileType == "application/csv")
            {
                if (postedFile.ContentLength > 0)
                {
                    var fileName = Path.GetFileName(postedFile.FileName);
                    var path = AppDomain.CurrentDomain.BaseDirectory + "Content\\csv\\" + fileName;
                    postedFile.SaveAs(path);
                }
                return View("Success");
            }
            else
            {
                ViewBag.Error = "Only CSV files allowed!";
                return View("Index");
            }
        }
    }
}