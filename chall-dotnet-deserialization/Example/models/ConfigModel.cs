public class ConfigModel
{
    public string configPath { get; set; }
    public string configContent
    {
        get
        {
            if (File.Exists(configPath))
            {
                return File.ReadAllText(configPath);
            }
            
            return null;
        }
        
        set {}
    }
}