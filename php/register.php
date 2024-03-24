<?php

	session_start();
	include("core.php");

	$login = $_POST ['login'];
	$password = $_POST ['password'];
	$password_confirm = $_POST ['password_confirm'];
	$full_name = $_POST ['full_name'];
	$email = $_POST ['email'];

	if ($password === $password_confirm) {
		# code...
		$password = md5($password);
		mysqli_query($mysqli, "INSERT INTO `users` (`id`, `login`, `password`, `full_name`, `email`) VALUES (NULL, '$login', '$password', '$full_name', '$email')");

		$_SESSION['message'] = 'Регистрация прошла успешно!';
		header("Location: auth.php");

	} else {
		$_SESSION['message'] = 'Пароли не совпадают';
		header("Location: reg.php");
	}
?>