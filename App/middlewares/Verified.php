<?php

namespace App\middlewares;

class Verified
{
    public function handle()
    {

        if ($_SESSION['user']['isProfileComplete']){

            header("location: /profile");

            exit();
        }
    }
}
