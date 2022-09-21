<?php

namespace App\Controllers;

use App\DBPdo;
use App\Repositories\UserPdoRepository;
use App\Services\AuthService;
use App\Services\PasswordService;
use App\View;

class AuthController
{
    public function index()
    {
        return View::make("auth/login")->render();
    }

    public function login()
    {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            //not valid
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        //todo: improve the dependency injection container to get Reflection classes
        // and binding interfaces to concrete classes
        $authService = new AuthService(new UserPdoRepository(new DBPdo()), new PasswordService());

        if (!$authService->authenticateUser($email, $password)) {
            //not valid
            //Session variable to show error message
            header("location: /login");
            die;
        }

        $_SESSION["loggedUser"] = $email;

        header("location: /");
        die;
    }

    public function logout()
    {
//        unset($_SESSION["loggedUser"]);
        session_destroy();
        header("location: /");
        die;
    }

}