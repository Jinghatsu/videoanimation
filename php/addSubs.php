<?php 
    include("core.php");
    $email = $_POST['email_input'];
    $name = $_POST['name_input'];
    $phone = $_POST['phone_input'];

    if (isset($_POST['footer-email__button'])) {
        $email;
        $name;
        $phone;
        mysqli_query($mysqli, "INSERT INTO `subscriptions` (`email`, `name`, `phone`) VALUES ('$email', '$name', '$phone')");
    } 
    header("location: ../index.php");
?>
