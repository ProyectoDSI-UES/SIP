using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace SistemaInformacionPersonal.Models
{
    public class Sesiones
    {
        public int ID_SESION { get; set; }
        public string CORREO { get; set; }
        public string CONTRASENIA { get; set; }

        public string ConfirmarClave { get; set; }
    }
}