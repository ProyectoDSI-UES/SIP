using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace SistemaInformacionPersonal.Permisos
{
    public class ValidarSesionAttribute : ActionFilterAttribute
    {
        public override void OnActionExecuting(ActionExecutingContext filterContext)
        {

            if (HttpContext.Current.Session["sesion"] == null) {
                filterContext.Result = new RedirectResult("~/Sesion/Login");
                
            }


            base.OnActionExecuting(filterContext);
        }

    }
}