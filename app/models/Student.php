<?php
    class Student {
        public function updateImage($user_id, $image_link, $image_key) {
            $db = new Database();
            $db->query('UPDATE user_students 
                SET image_link = :image_link, image_key = :image_key
                WHERE user_id = :user_id
            ');
            $db->bind(':image_link', $image_link);
            $db->bind(':image_key', $image_key);
            $db->bind(':user_id', $user_id);
            $db->execute();
        }
    }