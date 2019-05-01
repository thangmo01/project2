<?php 

    function getGClient() {
        $gClient = new Google_Client();
        $gClient->setApplicationName(SITENAME);
        $gClient->setClientId(GOOGLE_CLIENT_ID);
        $gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
        $gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
        $gClient->addScope(['profile', 'email', 'openid']);
        // https://developers.google.com/identity/protocols/googlescopes
    
        return $gClient;
    }

    function getUserProfileInfo($access_token) {	
        $url = 'https://www.googleapis.com/oauth2/v2/userinfo?fields=family_name,given_name,name,email,gender,id,picture,verified_email';	
        
        $ch = curl_init();		
        curl_setopt($ch, CURLOPT_URL, $url);		
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
        if($http_code != 200) 
            throw new Exception('Error : Failed to get user information');
            
        return $data;
    }