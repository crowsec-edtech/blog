<?php

namespace app\controllers;
use app\models\User;

class ProfileController
{
    public function index()
    {
        return require '../app/views/view_profile.php';
    }

    public function show()
    {
        if(isset($_SERVER['HTTP_X_PROFILE_ID']))
        {
            $profileId = $_SERVER['HTTP_X_PROFILE_ID'];
            if(!empty($profileId))
            {
                $user = new User;
                $find = $user->find('id', $profileId);
                if($find)
                {
                    return response_json((array)$find);
                }
            }
            return response_json(['Error' => 500]);
        }

        return response_json(['Error' => 500]);
    }
}