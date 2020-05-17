<?php

    include 'dbh.php';

    $sql = 'TRUNCATE `reminders`';
    mysqli_query($aHandle, $sql);

    header('Location: ../index.php');
    
?>