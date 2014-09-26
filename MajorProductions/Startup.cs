using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(MajorProductions.Startup))]
namespace MajorProductions
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
