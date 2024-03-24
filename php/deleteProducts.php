<?php
include ("core.php");
$id = $_POST['id'];
$res =  mysqli_query($mysqli, "SELECT * FROM `subscriptions` WHERE id = '$id'");
$num = mysqli_num_rows($res);
if($num == 0) {
    $_SESSION['delete_error']['product']='Введите ID существующей записи из бд';
    header('location: admin_panel.php#delProd');
}elseif(isset($_POST['deleteTovar'])){
    $id;
    mysqli_query($mysqli, "DELETE FROM `subscriptions` WHERE id='$id'");
    $_SESSION['success_delete']['delProduct'] = 'Вы успешно удалили запись из бд';
    header('location: admin_panel.php#delProd');
}
header("location: admin_panel.php#delProd");
?>
