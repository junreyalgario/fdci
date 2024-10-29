<?php

namespace Fdci\Controllers;

use Fdci\Core\Controller;
use Fdci\Core\Request;
use Fdci\Models\UserModel;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $view_data = [];

        if ($request->post('submit')) {
            try {
                $name = $request->post('name');
                $email = $request->post('email');
                $password = $request->post('password');
                $confirm_password = $request->post('confirm_password');

                $user_model = new UserModel();

                $valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $email_exist = $user_model->checkEmail($email);
                $password_matched = $password === $confirm_password;

                if (!$valid_email) {
                    $view_data['error'][] = 'Email is not valid.';
                }

                if ($email_exist) {
                    $view_data['error'][] = 'Email already exist.';
                }

                if (!$password_matched) {
                    $view_data['error'][] = 'Password does not match.';
                }

                if ($valid_email && !$email_exist && $password_matched) {
                    $user_model->insert([
                        'name' => $name,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ]);

                    return $this->render('thank_you');
                }
            } catch (\Throwable $th) {
                $view_data['error'][] = $th->getMessage();
            }
        }

        return $this->render('register', $view_data);
    }
}