<?php
    include('core.php');
    
    if (isset($_POST['accept'])) {
        $mysqli -> query("UPDATE `users` SET `accept` = '1' WHERE `id` = '{$_POST['id']}'");
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
?>