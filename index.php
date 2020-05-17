<?php   include ('./functions/dbh.php');
        $num_rows = 0;
?>
<!doctype html>
<html lang="en">
    <head>
        <title>JQuery To-Do List</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Other Imports-->
        <link rel="shortcut icon" href="https://pluspng.com/img-png/jquery-logo-png--800.gif">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- SCSS Import -->
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body>
        <div class="container text-center" id = 'firstSection'>
            <div class="card">
                <div class="card-header">Add Reminder</div>
                <div class="card-body">
                    <div class="pt-4"></div>
                    <form name = 'myForm'>
                        <input type="text" name = 'inputAddReminder' oninput = 'textCheck();' autocomplete = 'off'/>
                        <button id = 'buttonAddReminder' class = 'btn bg-success text-white'><i class="fa fa-plus" aria-hidden="true"></i></button>
                        <p id = 'reminderError' class = 'mt-4 text-info'><i class="fa fa-exclamation pl-2 pr-2" aria-hidden="true"></i> Type at least 5 characters.</p>
                    </form>
                </div>
            </div>
            <div class="pt-5"></div>
            <button id = "removeAll" class = 'btn bg-danger text-white text-left2' onclick = 'removeAll();' ><i class="fa fa-minus" aria-hidden="true"></i>&nbsp; Erase all reminders</button>
            <div class="pt-5"></div>
            <div class="pt-5 only-mobile"></div>
            <div class="card">
                <div class="card-header">Your Reminders</div>
                <div class="card-body p-5">
                    <div id = 'list'>
                        <!-- Dynamically area updated by JQuery. -->
                        <?php
                            $sql = "SELECT * FROM reminders";
                            $result = mysqli_query($aHandle, $sql);
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)){
                                    addPHPReminder($row['ID'], $row['Text'], $row['Date'], $row['Time']);
                                }
                            }

                            $sql2 = "SELECT * FROM reminders";
                            $result2 = mysqli_query($aHandle, $sql);
                            $num_rows = mysqli_num_rows($result2);

                            if($num_rows == 0){
                                echo "<p>There are not reminders at the moment.</p>";
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <p id = 'rowsTotal' class = 'invisible'><?php echo $num_rows; ?></p>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Optional JavaScript -->
        <!-- External Javascript -->
        <script language = 'JavaScript' src="./js/main.js"></script>
    </body>
</html>

<?php $_GET = array(); mysqli_close($aHandle); ?>