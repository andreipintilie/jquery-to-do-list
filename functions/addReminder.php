<?php

    include 'dbh.php';

    $reminderID = $_GET['id'];
    $text = htmlspecialchars($_GET['text']);

    htmlspecialchars();

    date_default_timezone_set('Europe/Riga');

    $sql = 'INSERT INTO `reminders` (ID, Text, Date, Time) VALUES ("'.$reminderID.'", "'.$text.'", "'.date('d/m/Y').'", "'.date('H:i:s').'");';
    mysqli_query($aHandle, $sql);

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    echo $sql;
    
    header('Location: ../index.php');

?>