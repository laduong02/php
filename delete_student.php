<?php
// Kiểm tra xem có tham số 'id' được truyền không
if(isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Gọi đến StudentManager và thực hiện hàm xóa sinh viên
    include 'StudentManager.php';
    $studentManager = new StudentManager();
    $studentManager->deleteStudent($studentId);

    // Chuyển hướng về trang danh sách sinh viên sau khi xóa
    header("Location: dashboard.php");
    exit();
} else {
    // Nếu không có tham số 'id', chuyển hướng về trang không tìm thấy
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    exit();
}
?>
