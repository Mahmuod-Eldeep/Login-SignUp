<?php
include_once('db.php');
$action = false;
if (isset($_POST['enter1'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password  = $_POST['pass'];
    $user_sql = "SELECT * FROM `t_user` WHERE `mobile`='$mobile' ";
    $all_user1 = mysqli_query($con, $user_sql);








    if (!empty($name)) {

        if (!empty($mobile)) {

            if (!empty($email)) {

                if (!empty($address)) {

                    if (!empty($password)) {
                    } else {
                        echo "يرجى ادخال كلمة المرور";
                    }
                } else {
                    echo "يرجى ادخال العنوان";
                }
            } else {
                echo "يرجى ادخال بريدك الالكنروني";
            }
        } else {
            echo "يرجى ادخال رقم الهاتف";
        }
    } else {
        echo "يرجى ادخال اسم المستخدم";
    }
    $length = mysqli_num_rows($all_user1);
    if ($length == null) {

        if (empty($name) || empty($mobile) || empty($email) || empty($address) || empty($password)) {
        } else {
            if (is_numeric($mobile)) {

                $add_sql = "INSERT INTO `t_user`( `name`, `email`, `pass`, `mobile`, `address`) VALUES ('$name','$email','$password','$mobile','$address')";
                $res_Create_Acc = mysqli_query($con, $add_sql);
                if (!$res_Create_Acc) {
                    die(mysqli_errno($con));
                } else {
                    $action = "add";
                }
            } else {
                echo "يرجى ادخال رقم صالح";
            }
        }
    } else {
        echo "هذا الرقم مسجل من قبل";
    }
}
?>
<!--------------------------------------------------------------------------->

<head>
    <meta charset="utf-8" />
    <title>انشاء حساب </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.6.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<!--------------------------------------------------------------------------->

<body class="bg-" dir="rtl">
    <h1 style="text-align: center;"> انشاء حساب </h1>
    <div class="row" style="margin-top: 50px;">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header bg-Dark " style="text-align: center; color: white;">يرجى ادخال البيانات</div>
                <div class="card-body bg-warning">
                    <form action="" method="POST">
                        <input type="text" name="name" value="" class="form-control" placeholder="ادخل اسم المستخدم" style="margin-top: 20px;" />
                        <input type="tel" name="mobile" value="" class="form-control" placeholder="ادخل رقم المستخدم" style="margin-top: 20px;" dir="rtl" />
                        <input type="email" name="email" value="" class="form-control" placeholder="ادخل بريدك الالكتروني" style="margin-top: 20px;" />
                        <input type="text" name="address" value="" class="form-control" placeholder="ادخل عنوانك " style="margin-top: 20px;" />
                        <input type="password" name="pass" value="" class="form-control" placeholder="ادخل كلمة المرور" style="margin-top: 20px;" />
                        <div>
                            <form>
                                <center>
                                    <input type="submit" name="enter1" value="انشاء حساب" class="btn btn-Dark" style="margin-top: 20px;">
                                </center>
                            </form>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
        <div class="offset-4"></div>
    </div>
    <!--------------------------------------------------------------------------->
    <div>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/jquery-3.6.1.slim.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="css/toster.css">
        <script src="js/jq.js"></script>
        <script src="js/toster.js"></script>
        <script src="js/main.js"></script>

        <?php
        if ($action != false) {
            if ($action == 'add') { ?>
                <script>
                    show_create_acc()
                </script>
        <?php
            }
        }
        ?>
        <!--------------------------------------------------------------------------->
    </div>
</body>