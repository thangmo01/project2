<?php
    class Check extends Controller {
        public function index()
        {
            $this->view('check/index');
        }

        public function imageCheck()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $url = 'http://localhost:5000/iden';
                $data = array(
                    'class_id' => $_POST['class_id'],
                    'image_uri' => $_POST['image_uri']
                );
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                $output = curl_exec($ch);
                $info = curl_getinfo($ch);
                var_dump($output);
                curl_close($ch);
    
                echo 'Hello, World';
            } else {
                echo "Nothing to Show";
            }

        }
    }