<?php

namespace App\Requests;

class RegisterRequest
{
    public function __construct()
    {

    }

    public static function validate($params)
    {
        if (strlen($params['post']['name']) > 15) {
            $_SESSION['message']['name'] = "Имя должно содержать не более 15 символов";
        }

        if (strlen($params['post']['name']) < 3) {
            $_SESSION['message']['name'] = "Имя должно содержать не менее 3 символов";
        }

        if (strlen($params['post']['password1']) < 8) {
            $_SESSION['message']['password1'] = "Пароль должен состоять миннимум из 8 симолов";
        }

        if (strlen($params['post']['password1']) > 50) {
            $_SESSION['message']['password1'] = "Пароль должен состоять максимум из 50 симолов";
        }

        if (filter_var($params['post']['email'], FILTER_VALIDATE_EMAIL)) {

        } else {
            $_SESSION['message']['email'] = "E-mail указан неверно.";
        }

        if ($params['post']['password1'] !== $params['post']['password2']) {
            $_SESSION['message']['password2'] = "Пароли не совпадают";
        }



    }
}