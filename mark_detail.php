<?php
session_start();

//kiểm tra nếu người dunghf chưa đăng nhập chuyển hướng về trang đăng nhập

if (isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit();
}




include 'StudentManager.php';

//lấy danh sách sinh viên và điểm theo môn học
$studentManager = new StudentManager();
$markDetails = $studentManager ->getMarkDetails();

//if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["add_mark"])) {
//    $student_id =$_POST["student_id"];
//    $subject_id=$_POST["subject_id"];
//    $marks= $_POST["marks"];
//    $sql = "insert into Marks(student_id, subject_id, mark) values ('$student_id, $subject_id,$marks')";
//    header("Location: dashboard.php");
//    exit();
//
//}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mark Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Mark Details</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Subjest</th>
            <th>Mark</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($markDetails as $markDetail):?>
        <tr>
            <td><?php echo $markDetail['id'];?></td>
            <td><?php echo $markDetail['name'];?></td>
            <td><?php echo $markDetail['subjects_name'];?></td>
            <td><?php echo $markDetail['mark'];?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>
