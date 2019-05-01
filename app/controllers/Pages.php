<?php


class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Project2',
            'description' => '555'
        ];
        $this->view('pages/index', $data);
    }

    public function login()
    {
        if(isset($_GET['code'])){
            $gClient = getGClient();
            $code = $_GET['code'];
            $gClient->authenticate($code);
            $token = $gClient->getAccessToken();
            $userProfile = getUserProfileInfo($token['access_token']);
        
            print_r($userProfile);
        }
    }
}