<?php
class Pages extends Controller
{
    private $data = [
        'title' => 'Project2',
        'description' => '555'
    ];

    public function __construct()
    {
        // $this->create_model = $this->model('Login');
    }

    public function index()
    {
        if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])) {
            $user = getUserProfileInfo($_SESSION['access_token']);
            // print_r($user);
            $email = $user['email'];
            $name = $user['given_name'];
            $surname = $user['family_name'];
            if(!isKmitlEmail($email)) {
                $this->data['error'] = 'ใช้ e-mail สถาบัน';
                $this->view('pages/index', $this->data);
            }
            else {
                $_SESSION['user_id'] = '1';
                $_SESSION['user_email'] = 'email';
                $_SESSION['user_name'] = 'name';
                switch (type($email)) {
                    case 'student':
                        redirect('student/index');
                        break;
                    case 'teacher':
                        redirect('teacher/index');
                        break;
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

    public function logout(){
        unset($_SESSION['access_token']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('');
    }
}