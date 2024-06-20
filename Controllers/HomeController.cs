using SistemaInformacionPersonal.App_Data;
using SistemaInformacionPersonal.Permisos;
using System.Web.Mvc;

namespace SistemaInformacionPersonal.Controllers
{

    [ValidarSesion]
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        public ActionResult CerrarSesion()
        {
            Session["sesion"] = null;
            return RedirectToAction("Login", "Sesion");
        }
    }
}