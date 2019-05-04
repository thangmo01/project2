<?php 
    function s3UploadStudentImage($tmp_name, $extension) {
        // Temp details
        $name = md5(uniqid());
        $tmp_file_name = "{$name}.{$extension}"; 
        $tmp_file_path = "img/{$tmp_file_name}";
        move_uploaded_file($tmp_name, $tmp_file_path);

        // Connect to AWS
        try {
            $s3 = new Aws\S3\S3Client(
                array(
                    'region'  => S3_REGION,
                    'version' => 'latest',
                    'credentials' => [
                        'key'    => AWS_ACCESS_KEY_ID,
                        'secret' => AWS_SECRET_ACCESS_KEY,
                    ]
                )
            );
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }

        // Add it to S3
        $bucket_name = 'project2-face-recognition.bucket02';
        $key = "image/student/{$tmp_file_name}";
        try {
            // Uploaded:
            $result = $s3->putObject(
                array(
                    'Bucket'=> $bucket_name,
                    'Key' => $key,
                    'StorageClass' => 'STANDARD',
                    'Body' => fopen($tmp_file_path, 'rb'),
                    'ACL' => 'public-read'
                    // https://docs.aws.amazon.com/AmazonS3/latest/dev/storage-class-intro.html
                )
            );
        }
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        
        $data = [
            'image_link' => $result['ObjectURL'],
            'image_key' => $key
        ];
        unlink($tmp_file_path);

        return $data;
    }
