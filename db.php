 <?php


    $con = new mysqli('localhost', 'root', '', 'user_data');


    if (!$con) {
        die(mysqli_error($con));
    }
