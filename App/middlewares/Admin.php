<?php

namespace App\middlewares;

class Admin
{
    public function handle()
    {

        if ($_SESSION['user']['role']!='ADMIN') {

            header("location: /");

            exit();
        }
    }
}
