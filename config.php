<?php

$host = "localhost:3306";//thong tin  severn cua csdl
$username = "root";
$password = "";
$database = "fptaptechdb1";

//ket noi csdl
$conn = new mysqli($host, $username, $password, $database);
//kiem tra ket noi co thanh cong hay khong
if ($conn->connect_error) {
    die("ket noi den csdl khong thanh cong " . $conn->connect_error);
} else
    echo "ket noi csdl thanh cong";
//dong ket noi den csdl sau khi thuc thi
$conn->close();

