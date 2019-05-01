<?php


class Pages extends Controller
{
    private $data = [
        'title' => 'Project2',
        'description' => '555'
    ];

    public function __construct()
    {
    }

    public function index()
    {
        if(isset($_SESSION['access_token']) && !empty($_SESSION['access_token'])) {
            $user = getUserProfileInfo($_SESSION['access_token']);
            $email = $user['email'];
            if(!isKmitlEmail($email)) {
                $this->data['error'] = 'ใช้ e-mail สถาบัน';
                $this->view('pages/index', $this->data);
            }
            else {
                echo 'OK';
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