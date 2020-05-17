<?php

    include 'dbh.php';

    $removeReminderID = $_GET['id'];

    $sql = 'DELETE FROM `reminders` WHERE `ID` = '.$removeReminderID.';';
    mysqli_query($aHandle, $sql);

    header('Location: ../index.php');
?>