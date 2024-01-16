<?php
session_start();
$host = "localhost:3306";//thong tin  severn cua csdl
$username="root";
$password="";
$database="fptaptechdb1";

//ket noi csdl
$conn = new mysqli($host,$username,$password,$database);
//kiem tra ket noi co thanh cong hay khong
if ($conn->connect_error){
    die("ket noi den csdl khong thanh cong ".$conn->connect_error);
}
//xu ly phan dang nhap
$username =$_POST["username"];
$password =$_POST["password"];

//thuc hien truy van thong tin dang nhap
$query = "SELECT * FROM account where username='$username' and password='$password'";
$result = $conn->query($query);//thuc hien truy van den csdl tren server
if ($result-> num_rows>0){
    echo"dang nhap thanh cong";
    $_SESSION['username']=$username;
    header("Location:dashboard.php");//dieu huowng sang sang nay neu login thanh cong.
}else{
    echo"dang nhap khong thanh cong";
}
//dong ket noi sau khi da thuc hien xong
$conn->close();

?>