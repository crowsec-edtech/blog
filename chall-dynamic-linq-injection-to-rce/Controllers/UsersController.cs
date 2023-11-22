using Microsoft.AspNetCore.Mvc;
using Models;
using System.Linq.Dynamic.Core;

[Route("api")]
[ApiController]
public class UsersController : ControllerBase
{
    [Route("users")]
    [HttpPost]
    public IActionResult Show([FromBody] ShowUsers showUsers)
    {
        var users = new List<Users>
        {
            new Users { 
                Name = "Carlos",
                LastName = "Vieira",
                Email = "lynx@fake.com",
                Nick = "lynx"
            },
            new Users { 
                Name = "Luciane",
                LastName = "Goes",
                Email = "eagle@fake.com",
                Nick = "eagle"
            },
            new Users { 
                Name = "Maiky",
                LastName = "Jhony",
                Email = "vert16x@fake.com",
                Nick = "vert16x"
            },
            new Users { 
                Name = "Murilo",
                LastName = "Caixeta",
                Email = "tris0n@fake.com",
                Nick = "tris0n"
            }
        };

        var query = users.AsQueryable();

        if(showUsers.field != null)
        {
            var response = query.OrderBy(showUsers.field);
            return new JsonResult(new { Users = response.ToArray() });
        }

        return new JsonResult(users);
    }
}
