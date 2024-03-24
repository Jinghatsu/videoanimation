<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Авторизация</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    a {
        text-decoration: none;
    }
    .regtext {
    margin-top: 2em;
    font-style: normal;
    font-weight: 400;
    font-size: 18px;
    line-height: 140%;
    }
    .msg {
      border: 2px solid blue;
      border-radius: 3px;
      padding: 10px;
      text-align: center;
      font-weight: 500;
    }
  </style>

<link rel="stylesheet" href="../css/signin.css">
</head>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="lilcont">
        <h2><a href="../index.php">Вернуться на главную</a></h2>
      </div>
    </div>
  </div>

  <body class="text-center">
  <?php include("header_admin.php") ?>
    <main class="form-signin">
      <form action="login.php" method="post">
        <img class="mb-4" src="../assets/img/Logo.jpg" alt="" width="140" height="100">
        <h1 class="h3 mb-3 fw-normal">Авторизация</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="login" placeholder="Login">
          <label for="floatingInput">Логин</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
          <label for="floatingPassword">Пароль</label>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
        <p class="regtext">Еще не зарегистрированы?<a href= "reg.php"> Регистрация</a></p>
        <?php
          session_start();
          if(!empty($_SESSION['message'])){
            echo '<p class="mt-4 mb-2 msg"> ' . $_SESSION['message'] . ' </p>';
          }
            unset($_SESSION['message']);
          ?>
        <p class="mt-5 mb-3 text-muted">&copy; WAKAI</p>
      </form>
    </main>
  </body>

</html>