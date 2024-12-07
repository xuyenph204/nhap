class UserController {
    public function index() {
    $users = User::getAll();
    if (!$users) {
        $users = []; // Khởi tạo mảng rỗng nếu không có dữ liệu
    }
    include "views/admin/users/index.php";
}

    public function edit($id) {
        // Kiểm tra xem người dùng có tồn tại hay không
        $user = User::getById($id);
        if (!$user) {
            // Nếu không tìm thấy người dùng, điều hướng về trang người dùng
            header("Location: index.php?controller=user&action=index");
            exit;
        }
        include "views/admin/users/edit.php";
    }

    public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Lấy dữ liệu từ form
        $username = trim($_POST['username']);
        $role = intval($_POST['role']);

        // Kiểm tra dữ liệu hợp lệ trước khi cập nhật
        if (empty($username)) {
            $error = "Tên người dùng không được để trống.";
        } elseif (!in_array($role, [1, 2])) {
            $error = "Quyền không hợp lệ.";
        }

        if (!isset($error)) {
            User::update($id, $username, $role);
            header("Location: index.php?controller=user&action=index");
            exit;
        }

        // Nếu có lỗi, trả lại trang chỉnh sửa
        $user = User::getById($id);
        include "views/admin/users/edit.php";
    }
}
}
