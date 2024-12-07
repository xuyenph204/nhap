<?php
session_start();  // Bắt đầu session

class AdminController {
    public function login() {
        // Kiểm tra nếu người dùng đã đăng nhập rồi thì không cần phải đăng nhập lại
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: index.php?controller=admin&action=dashboard');
            exit();
        }

        // Nếu gửi thông tin đăng nhập
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Kiểm tra tài khoản và mật khẩu
            $user = User::getByUsername($username);
            if ($user && password_verify($password, $user['password']) && $user['role'] === 1) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_username'] = $user['username'];
                header('Location: index.php?controller=admin&action=dashboard');
                exit();
            } else {
                $error = "Tài khoản hoặc mật khẩu không đúng!";
            }
        }

        include "views/admin/login.php";
    }

    public function logout() {
        // Xóa session khi đăng xuất
        session_unset();
        session_destroy();
        header('Location: index.php?controller=admin&action=login');
        exit();
    }

    public function dashboard() {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }

        include "views/admin/dashboard.php";
    }
}
?>