<?PHP

namespace App\Libraries;

class Main_view
{
    public function init($view, $title, $is_login = false, $extends = [])
    {
        $data['login']  = $is_login;
        $data['view']   = $view;
        $data['title']  = $title;
        foreach($extends as $key => $val)
        {
            $data[$key] = $val;
        }
        echo view('main', $data);
    }
}