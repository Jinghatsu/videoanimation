<?php 
mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = new mysqli("localhost", "root", "", "rahat");
session_start();

if (!$mysqli) {
    die("Connection Fialed" . mysqli_connect_error());
} else {
    "Успешно";
}
?>