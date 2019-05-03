<?php
class Pages extends Controller
{
    private $data = [
        'title' => 'Project2',
        'description' => '555'
    ];

    public function __construct()
    {
        checkLoggedIn();
        $this->create_model = $this->model('Login');
    }

    public function index()
    {
        if(isset($_SESSION[google_access_token]) && !empty($_SESSION[google_access_token])) {
            $user = getUserProfileInfo($_SESSION[google_access_token]);

            $email = $user['email'];
            $first_name = $user['given_name'];
            $last_name = $user['family_name'];
            $outh_uid = $user['id'];
            if(!isKmitlEmail($email)) {
                $this->data['error'] = 'ใช้ e-mail สถาบัน';
                $this->view('pages/index', $this->data);
            }
            else {
                $user_session = [
                    user_email => $email,
                    user_name => $first_name . ' ' . $last_name
                ];
                switch (type($email)) {
                    case 'student':
                        $student_id = substr($email,0,8);
                        $user_session[user_id] = $this->create_model->Student_Add($outh_uid, $first_name, $last_name, 2, $student_id);
                        $user_session[user_type] = 'student';
                        $user_session[student_id] = $student_id;
                        createUserSession($user_session);
                        redirect('students/index');
                        break;
                    case 'teacher':
                        $user_session[user_id] = $this->create_model->Teach_Add($outh_uid, $first_name, $last_name, 1);
                        $user_session[user_type] = 'teacher';
                        createUserSession($user_session);
                        redirect('teachers/index');
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
        $_SESSION[google_access_token] = $token['access_token'];
        redirect('');
    }

    public function logout(){
        unset($_SESSION[google_access_token]);
        unset($_SESSION[user_id]);
        unset($_SESSION[user_email]);
        unset($_SESSION[user_type]);

        unset($_SESSION[student_id]);

        session_destroy();
        redirect('');
    }
}