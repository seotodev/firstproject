<?php 

$name = addslashes($_POST['name']);
$email = $_POST['email'];
$password = addslashes($_POST['password']);
$phone = addslashes($_POST['phone']);

require './admin/connect.php';
$sql = "select count(*) from customers
where email = '$email'";

$result = mysqli_query($connection, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if($number_rows == 1) {
    $_SESSION['error'] = 'Email đã tồn tại';
    header("location:index.php");
    exit;
};

$sql = "select count(*) from customers
where email = '$phone'";

$result = mysqli_query($connection, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
if($number_rows == 1) {
    $_SESSION['error'] = 'Số điện thoại đã tồn tại';
    header("location:index.php");
    exit;
};

$sql = "insert into customers (name, phone, email, password)
values('$name', $phone, '$email', '$password')";
mysqli_query($connection, $sql);

$sql = "select id from customers
where email = '$email'";
mysqli_query($connection, $sql);

$result = mysqli_query($connection, $sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;


mysqli_close($connection);

$_SESSION['success'] = 'Đăng ký thành công';
header("location:index.php");