<?php

namespace app\models;

class User {
    public function getAllUsersByName($params) {
        //in future these will come from the database

        $allUsers = [
            [
                'id' => '1',
                'name' => 'pinecone'
                //'desc' => 'the best cat'
            ],
            [
                'id' => '2',
                'name' => 'nathan'
                //'desc' => 'chill prof'
            ],
//            [
//                'id' => '3',
//                'name' => "<script>alert('imagine i am doing something malicious')</script>"
//            ],
        ];

        if (!empty($params['name'])) {
            return array_filter($allUsers, function ($user) use ($params) {
                if (str_contains(strtolower($user['name']), $params['name'])) {
                    return $user;
                };
                return null;
            });
        }

        return $allUsers;
    }

    public function saveUsers() {
        //in future this will save a user to the database
    }
}