<?php 

include_once '../model/auth_model/login_model.php';
include_once '../model/auth_model/register_model.php';

class AuthController {
    static function login() {
        view('auth_page/login', ['url' => 'login']);
    }

    static function register() {
        view('auth_page/register', ['url' => 'register']);
    }

    static function saveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = LoginModel::login($post['username'], $post['password']);
        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            header('Location: '.BASEURL);
        } else {
            header('Location: '.BASEURL.'login?failed=true');
        }
    }

    static function saveRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = RegisterModel::register($post['nama'], $post['email'], $post['password']);
        if ($user) {
            header('Location: '.BASEURL.'login');
        } else {
            header('Location: '.BASEURL.'register?failed=true');
        }
    }

    static function logout() {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header('Location: '.BASEURL.'login');
    }

    static function forgotPassword() {}
}
