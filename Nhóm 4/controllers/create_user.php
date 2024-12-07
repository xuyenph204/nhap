<?php
// Mã hóa mật khẩu người dùng khi lưu vào cơ sở dữ liệu
$username = 'admin';  // Tên người dùng mới
$password = '123456'; // Mật khẩu người dùng mới
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Mã hóa mật khẩu

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'tintuc');  // Thay đổi thông tin kết nối phù hợp

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Thực hiện câu lệnh INSERT để thêm người dùng mới vào cơ sở dữ liệu
$sql = "INSERT INTO users (username, password, role) 
        VALUES ('$username', '$hashedPassword', 1)"; // 1 là quyền admin

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
