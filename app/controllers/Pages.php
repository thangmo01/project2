<?php


class Pages extends Controller
{
    private $data = [
        'title' => 'Project2',
        'description' => '555'
    ];

    public function __construct()
    {
        $this->create_model = $this->model('Login');
    }

    public function index()
    {
        if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])) {
            $user = getUserProfileInfo($_SESSION['access_token']);
            $email = $user['email'];
            $student_code = substr($email,0,8);
            $name = $user['given_name'];
            $surname = $user['family_name'];
            $id = $user['id'];
            if(!isKmitlEmail($email)) {
                $this->data['error'] = 'ใช้ e-mail สถาบัน';
                $this->view('pages/index', $this->data);
            }
            else {
                    if(type($email)=='student') {
                        $this->create_model->Student_Add($id,$name,$surname,2,$student_code);
                    }
                    elseif (type($email)=='teacher') {
                        $this->create_model->Teach_Add($id,$name,$surname,1);
                    }
                    else {
                        $this->view('pages/index', $this->data);
                    }
            }
        }
        else {
            $this->view('pages/index', $this->data);
        }
    }

    public function login()
    {
        if(!isset($_GET['code']) || empty($_GET['code'])) {
            redirect('');
        }

        $gClient = getGClient();
        $auth = $gClient->authenticate($_GET['code']);
        $token = $gClient->getAccessToken();
        $_SESSION['access_token'] = $token['access_token'];
        redirect('');
    }
}