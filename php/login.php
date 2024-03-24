<?php

session_start();
include("core.php");

$login = $_POST ['login'];
$password = md5($_POST ['password']);

$check_user = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {

  $user = mysqli_fetch_assoc($check_user);

  $_SESSION['login'] = [
    "id" => $user['id'],
    "login" => $user['login'],
    "isAdmin" => $user['isAdmin'],
    "accept" => $user['accept']
  ];

  header("Location: ../index.php");

} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
		header("Location: auth.php");
}

?>
