<?php
session_start();
//kieemr tra session
if(!isset($_SESSION["username"])){
    header("Location:index.php");
    exit();
}


include 'StudentManager.php';

//kết nối đến studentManager
$studentManager = new StudentManager();

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $studentManager->deleteStudent($_GET['id']);
}
$student = $studentManager->getAllStudents();

//lấy danh sách sinh viên và thông tin điểm
$students = $studentManager ->getAllStudentsWithMarks();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Welcome, <?php echo $_SESSION['username'];?>!</h2>
    <p>This is the main page after successful login.</p>

    <a href="logout.php" class="btn btn-danger"> Logout</a>

    <h3>Student List</h3>
    <a href="add_student.php" class="btn btn-success mb-3">Add Student</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Action</th>
            <th>Mark Details</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student):
         ?>
        <tr>
            <td><?php echo $student["id"];?></td>
            <td><?php echo $student["name"];?></td>
            <td><?php echo $student["address"];?></td>

            <td>
                <a href="edit_student.php?id=<?php echo $student["id"];?> " class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_student.php?id=<?php echo $student["id"];?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure want to delete this student?')">Delete</a>

            </td>
            <td>
                <?php
                //kiểm tra xem sinh vin có điểm hay không
                if ($student['mark_count']>0){
                    echo '<a href="mark_detail.php?student_id= '.$student['id'] .'"  class="btn btn-info btn-sm" > Grade Details</a>';
                }else{
                    echo '<button class="btn btn-info btn-sm" disabled>Grade Details</button>';
                }
                ?>
            </td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>