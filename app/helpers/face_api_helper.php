<?php
    function face_api_upload_student_image($image_file, $outh_uid) {
        ini_set('max_execution_time', 300);
        $ch = curl_init();
        $url = FACE_API_HOST . FACE_API_UPLOAD_STUDENT_IMAGE;
        $cfile = new CURLFile($image_file['tmp_name'], $image_file['type'], $image_file['name']);
        $data = array(
            'image_file' => $cfile,
            'outh_uid' => $outh_uid
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res, true);
    }

    function face_api_face_identify($class_id, $image_blob) {
        // https://tecadmin.net/post-json-data-php-curl/
        ini_set('max_execution_time', 300);
        $ch = curl_init();

        $url = FACE_API_HOST . FACE_API_FACE_IDENTIFY;                
        $data = array(
            'class_id' => $class_id,
            'image_blob' => $image_blob
        );
        $payload = json_encode($data);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload))
        );
        
        $result = curl_exec($ch);
        return $result;
    }