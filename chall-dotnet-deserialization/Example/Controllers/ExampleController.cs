using Microsoft.AspNetCore.Mvc;

[Route("api")]
[ApiController]
public class ExampleController : ControllerBase
{
    [HttpGet("example")]
    public IActionResult Get()
    {
        var userData = new UserModel
        {
            Name = "tris0n",
            Email = "tris0n@mail.com",
            Age = 16,
            PersonalInfo = new PersonalInfo {
                CPF = "999.999.999-99"
            }
        };

        return Ok(userData);
    }

    [HttpPost("example")]
    public IActionResult Post([FromBody] UserModel userData)
    {
        return Ok(userData);
    }
}