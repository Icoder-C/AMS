<?php

namespace App\middlewares;

class Auth
{
    public function handle()
    {

        if (empty($_SESSION['user'])) {

            header("location: /");

            exit();
        }
    }
}
