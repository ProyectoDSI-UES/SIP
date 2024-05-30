using SistemaInformacionPersonal.App_Data;
using System.Linq;
using System.Web.Mvc;

namespace SistemaInformacionPersonal.Controllers
{
    [RoutePrefix("usuarios")]
    public class UsuarioController : Controller
    {
        SIPEntities db = new SIPEntities();

        [Route("listado")]
        public ActionResult Index()
        {
            var totalUsers = db.USUARIOS.Where(user => user.ACTIVO == true).ToList();
            return View(totalUsers);
        }

        [Route("detalle/{id}")]
        public ActionResult Detalle(int id)
        {
            var user = db.USUARIOS.Find(id);
            return View(user);
        }

        [Route("crear")]
        public ActionResult Crear()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Crear(FormCollection collection)
        {
            try
            {
                // TODO: Add insert logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Usuario/Edit/5
        public ActionResult Editar(int id)
        {
            return View();
        }

        // POST: Usuario/Edit/5
        [HttpPost]
        public ActionResult Editar(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add update logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: Usuario/Delete/5
        public ActionResult Eliminar(int id)
        {
            return View();
        }

        // POST: Usuario/Delete/5
        [HttpPost]
        public ActionResult Eliminar(int id, FormCollection collection)
        {
            try
            {
                // TODO: Add delete logic here

                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}
