<?php
    include ('core.php');
    if ($_SESSION['login']['isAdmin'] == 0) {
    header("Location: ../index.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAKAI - Курс по Adobe After Effects</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/secondstyle.css">
</head>
<style>
*,
*::before,
*::after {
  box-sizing: border-box;
}

@media (prefers-reduced-motion: no-preference) {
  :root {
    scroll-behavior: smooth;
  }
}
table {
font-family: 'Rubik', sans-serif;
text-align: center;
border-collapse: separate;
border-spacing: 1rem;
color: white;
border-radius: 15px;
}
th {
text-transform: uppercase;
font-weight: 400;
font-size: 18px;
padding: 10px;
}
td {
background: rgba(65, 105, 225, 0.6);
padding: 14px;
color: white;
}
.changedfont {
    font-size: 20px;
}
#deleteTovar {
    color: #fff;
    font-size: 16px;
    background: rgba(65, 105, 225, 0.6);
    outline: none;
    border: none;
    padding: 15px 20px;
    border-radius: 7px;
    margin-bottom: 1.5rem;
    transition: 0.3s; /* чтобы плавно менялся цвет при наведении (:hover) */
}
.deletebut {
    color: #fff;
    font-size: 16px;
    background: rgba(65, 105, 225, 0);
    outline: none;
    border: none;
    transition: 0.3s; /* чтобы плавно менялся цвет при наведении (:hover) */
}
#deleteTovar:hover {
  background: rgba(25, 25, 121, 0.6);
}
</style>
<body>
<?php include("header_admin.php") ?>
    <div class="mine container">
        <div class="row">
            <div class="col-lg-12">
                <div class="lilcont">
                    <img src="assets/img/Vector.png" alt="" width="23" height="15">
                </div>
            </div>
            <div class="zagolovok col-lg-12">
                <h1>Записи на курс по форме</h1>
            </div>
        </div>
        <div class="row">
            <div class="subzagolovok col-lg-12">
                <h2>Данные пользователя:</h2>
                <?php
                    $mysqli = new mysqli("localhost", "root", "", "rahat");
                    if($mysqli->connect_error){
                        die("Ошибка: " . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM subscriptions";
                    if($result = $mysqli->query($sql)){
                        $rowsCount = $result->num_rows; // количество полученных строк
                        echo "<p>Получено объектов: $rowsCount</p>";
                        echo "<table><tr><th>ID</th><th>Имя</th><th>Телефон</th><th>Почта</th></tr>";
                        foreach($result as $row){
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["phone"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        $result->free();
                    } else{
                        echo "Ошибка: " . $mysqli->error;
                    }
                    $mysqli->close();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <form action="../php/deleteProducts.php" method="post">
                <div class="main-admin-block-delete" id="delete_Tovar">
                    <div class="main-admin-block-delete__p">
                        <br>
                        <p class="changedfont">Удалить запись</p>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="ID записи" name="id">
                    </div>
                </div>
                <?php
                if (isset($_SESSION['delete_error'])) {
                    foreach ($_SESSION['delete_error'] as $key => $value) {
                        echo "<p style='color: red; margin-top: 15px;font-size: 18px';>", $value, "</p>";
                    }
                    unset($_SESSION['delete_error']);
                }

                if (isset($_SESSION['success_delete'])) {
                    foreach ($_SESSION['success_delete'] as $key => $value) {
                        echo "<p style='color: green; margin-top: 15px;font-size: 18px';>", $value, "</p>";
                    }
                    unset($_SESSION['success_delete']);
                }
                ?>
                <div class="button">
                    <button id="deleteTovar" name="deleteTovar">Удалить запись</button>
                </div>
            </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="lilcont">
                    <img src="assets/img/Vector.png" alt="" width="23" height="15">
                </div>
            </div>
            <div class="zagolovok col-lg-12">
                <h1>Доступ для авторизированных пользователей</h1>
            </div>
        </div>
        <div class="row">
            <div class="subzagolovok col-lg-12">
                <h2>Данные пользователя:</h2>
                <?php
                    $mysqli = new mysqli("localhost", "root", "", "rahat");
                    if($mysqli->connect_error){
                        die("Ошибка: " . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM `users` WHERE `accept` = '0'";
                    if($result = $mysqli->query($sql)){
                        $rowsCount = $result->num_rows; // количество полученных строк
                        echo "<p>Получено объектов: $rowsCount</p>";
                        echo "<table><tr><th>ID</th><th>Логин</th><th>Имя</th><th>Почта</th><th>Доступ</th></tr>";
                        foreach($result as $row){
                            echo "<form action='accept.php' method='post'>";
                                echo "<td><input type='hidden' value='{$row['id']}' name='id'>" . $row["id"] . "</td>";
                                echo "<td><input type='hidden' value='{$row['login']}' name='login'>" . $row["login"] . "</td>";
                                echo "<td><input type='hidden' value='{$row['full_name']}' name='full_name'>" . $row["full_name"] . "</td>";
                                echo "<td><input type='hidden' value='{$row['email']}' name='email'>" . $row["email"] . "</td>";
                                echo "<td><button class='deletebut' name='accept'>Дать доступ</button></td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        $result->free();
                    } else{
                        echo "Ошибка: " . $mysqli->error;
                    }
                    $mysqli->close();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <form action="../php/deleteProducts.php" method="post">
                <div class="main-admin-block-delete" id="delete_Tovar">
                    <div class="main-admin-block-delete__p">
                        <br>
                        <p class="changedfont">Удалить запись</p>
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="ID записи" name="id">
                    </div>
                </div>
                <?php
                if (isset($_SESSION['delete_error'])) {
                    foreach ($_SESSION['delete_error'] as $key => $value) {
                        echo "<p style='color: red; margin-top: 15px;font-size: 18px';>", $value, "</p>";
                    }
                    unset($_SESSION['delete_error']);
                }

                if (isset($_SESSION['success_delete'])) {
                    foreach ($_SESSION['success_delete'] as $key => $value) {
                        echo "<p style='color: green; margin-top: 15px;font-size: 18px';>", $value, "</p>";
                    }
                    unset($_SESSION['success_delete']);
                }
                ?>
                <div class="button">
                    <button id="deleteTovar" name="deleteTovar">Удалить запись</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>