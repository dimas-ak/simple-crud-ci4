<?PHP
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Main_view;
use Codeigniter\Session\Session;
use App\Models\Dbs;

class Login extends Controller
{
    function __construct()
    {
        helper(["short", "form", "short", "url"]);
    }

    function index()
    {
        if(hasSession("admin"))
        {
           return redirect()->to(base_url("home"));
        }
        
        $view       = new Main_view();
        $dbs        = new Dbs();

        $data["form"]   = form_open();
        $error =  
            [ 
                "required"      => "{field} harap di isi.",
                "min_length"    => "Minimal untuk {field} ialah {param}",
                "max_length"    => "Maksimal untuk {field} ialah {param}",
            ];

        setRule("username", "Username", "required|max_length[15]", $error);
        setRule("password", "Password", "required|max_length[30]", $error);
        setErrorDelimiters('<div class="form-error"><span>',  '</span></div>');

        if(validRun($this->request))
        { 

            $check = $dbs->rowArray("username", getPost("username"), "user");

            if($check && getPost("password") == decrypt($check["password"]))
            {
                setSession("admin", encryption($check['id']));
                return redirect()->to(base_url("/home"));
            }
            else
            {
                setFlashdata("error", '<div class="form-error">Username atau Password Salah !!!</div>');
                return redirect()->to(base_url());
            }
        }

        $v      = view("login", $data);
        $title  = "Menu Login";
        $view->init($v, $title);
    }
}