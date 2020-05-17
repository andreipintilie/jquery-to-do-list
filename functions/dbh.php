<?php

    $SQL_SERVER = 'localhost';
    $SQL_USER = 'root';
    $SQL_PASS = '';
    $SQL_DATA = 'reminders';

    $aHandle = mysqli_connect($SQL_SERVER, $SQL_USER, $SQL_PASS, $SQL_DATA);

    function addPHPReminder($id, $text, $date, $time){
        echo
        '
        <div id="'.$id.'">
            <div class="card">
                <div class="card-header">ID: <strong>'.$id.'</strong></div>
                <div class="card-body d-inline-block">
                    <p class = "card-text pb-2">'.$text.'</p>
                    <div class="buttons d-inline-block">
                        <button id = "buttonRemoveReminder" title = "Remove" class = "btn bg-danger text-white" onclick = removeReminder('.$id.');><i class="fa fa-trash" aria-hidden="true"></i></i></button>
                    </div>
                </div>
                <div class="card-footer">
                    '.$date.'<br/>
                    '.$time.'
                </div>
            </div>
            <div class="pt-5"></div>
        </div>
        ';
    }

?>
