<?php

include_once('db.php');

$action = false;

$variable1 = $_COOKIE['variable1'];
$variable2 = $_COOKIE['variable2'];


$user_sql = "SELECT `name`,`email`,`mobile`,`address` FROM `t_user` WHERE `mobile`='$variable1' and`pass`='$variable2' ";
$all_user = mysqli_query($con, $user_sql);
$user = $all_user->fetch_assoc();
$length = mysqli_num_rows($all_user);
if ($length == null) {
    echo "";
} else {
    $action = "ddd";
}



















?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.6.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/toster.css">
    <script src="js/jq.js"></script>
    <script src="js/toster.js"></script>
    <script src="js/main.js"></script>

    <title>Users App</title>
</head>

<body>

    <div class="container">
        <div class="wrapper p-5 m-5">
            <div class="d-flex p-2 justify-content-between mb-2">
                <h2>بيانات المستخدم</h2>
                <div><a href="add_user.php"><i data-feather="user-plus"></i></a></div>


            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">الاسم</th>
                        <th scope="col">رقم الهاتف</th>
                        <th scope="col">الايميل</th>
                        <th scope="col">العنوان</th>

                </thead>
                <tbody>
                    <?php

                    ?>

                    <tr>

                        <td>

                            <?php echo $user['name']; ?>
                        </td>
                        <td>
                            <?php echo $user['mobile']; ?>
                        </td>
                        <td>
                            <?php echo $user['email']; ?>
                        </td>
                        <td>
                            <?php echo $user['address']; ?>
                        </td>

                        <td>
                    </tr>

                    <?php

                    ?>
                    <div>
                        <?php
                        if ($action != false) {
                            if ($action == 'ddd') { ?>
                                <script>
                                    show_Login_acc()
                                </script>
                        <?php
                            }
                        }


                        ?>
                    </div>


</body>

</html>