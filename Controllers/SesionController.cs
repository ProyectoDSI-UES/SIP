using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Web;
using System.Web.Mvc;
using SistemaInformacionPersonal.App_Data;
using SistemaInformacionPersonal.Models;
using System.Data.SqlClient;
using System.Data;
using System.Web.Services.Description;


namespace SistemaInformacionPersonal.Controllers
{
    public class SesionController : Controller
    {
        static string cadena = "Data Source=DESKTOP-O03TRCE\\SQLEXPRESS01;Initial Catalog=DB_SIP;Integrated Security=true";



        // GET: Sesion
        public ActionResult Login()
        {
            return View();
        }
        public ActionResult Registrar()
        {
            return View();
        }

        [HttpPost]
        public ActionResult Registrar(Sesiones oUsuario)
        {
            bool registrado;
            string mensaje;

            if(oUsuario.CONTRASENIA == oUsuario.ConfirmarClave)
            {
                oUsuario.CONTRASENIA = ConvertirSha256(oUsuario.CONTRASENIA);
            }else
            {
                ViewData["Mensaje"] = "Las contraseñas no coinciden";
                return View();
            }

            using (SqlConnection cn = new SqlConnection(cadena)) {

                SqlCommand cmd = new SqlCommand("sp_RegistrarUser",cn);
                cmd.Parameters.AddWithValue("CORREO", oUsuario.CORREO);
                cmd.Parameters.AddWithValue("CONTRASENIA", oUsuario.CONTRASENIA);
                cmd.Parameters.Add("Registrado", SqlDbType.Bit).Direction = ParameterDirection.Output;
                cmd.Parameters.Add("Mensaje", SqlDbType.VarChar,100).Direction = ParameterDirection.Output;
                cmd.CommandType = CommandType.StoredProcedure;

                cn.Open();

                cmd.ExecuteNonQuery();

                registrado = Convert.ToBoolean(cmd.Parameters["Registrado"].Value);
                mensaje = cmd.Parameters["Mensaje"].Value.ToString();
            }
            ViewData["Mensaje"] = mensaje;

            if(registrado)
            {
                return RedirectToAction("Login", "Sesion");
            }
            else{
                return View();
            }

        }
        [HttpPost]
        public ActionResult Login(Sesiones oUsuario)
        {
            oUsuario.CONTRASENIA = ConvertirSha256(oUsuario.CONTRASENIA);

            using (SqlConnection cn = new SqlConnection(cadena))
            {

                SqlCommand cmd = new SqlCommand("sp_ValidarUser", cn);
                cmd.Parameters.AddWithValue("CORREO", oUsuario.CORREO);
                cmd.Parameters.AddWithValue("CONTRASENIA", oUsuario.CONTRASENIA);
                cmd.CommandType = CommandType.StoredProcedure;

                cn.Open();

               oUsuario.ID_SESION = Convert.ToInt32(cmd.ExecuteScalar().ToString());

      
            }

            if(oUsuario.ID_SESION != 0)
            {
                Session["sesion"] = oUsuario;
                return RedirectToAction("Index", "Home");
            }
            else{
                ViewData["Mensaje"] = "usuario no encontrado";
                return View();
            }

            
        }

        public static string ConvertirSha256(string texto)
        {
            //using System.Text;
            //USAR LA REFERENCIA DE "System.Security.Cryptography"

            StringBuilder Sb = new StringBuilder();
            using (SHA256 hash = SHA256Managed.Create())
            {
                Encoding enc = Encoding.UTF8;
                byte[] result = hash.ComputeHash(enc.GetBytes(texto));

                foreach (byte b in result)
                    Sb.Append(b.ToString("x2"));
            }

            return Sb.ToString();
        }


    }
}