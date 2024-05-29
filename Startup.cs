using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(SistemaInformacionPersonal.Startup))]
namespace SistemaInformacionPersonal
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
