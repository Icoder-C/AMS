<?php

namespace App\middlewares;

class Guest
{
    public function handle()
    {

        if (!empty($_SESSION['user'])) {

            header("location: /dashboard");

            exit();
        }
    }
}
