<?php
    class Check extends Controller {
        public function index()
        {
            $this->view('check/index');
        }

        public function imageCheck()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                ini_set('max_execution_time', 300);
                // https://tecadmin.net/post-json-data-php-curl/
                $url = 'http://localhost:5000/iden';                
                $data = array(
                    'class_id' => $_POST['class_id'],
                    'image_uri' => $_POST['image_uri']
                );
                $payload = json_encode($data);
 
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                 
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($payload))
                );
                
                $result = curl_exec($ch);
                curl_close($ch);

                echo $result;
            } else {
                echo "Nothing to Show";
            }

        }
    }