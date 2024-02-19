<head>
    <meta charset="utf-8" />
    <title>صفحة الدخول</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.6.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/toster.css">
    <script src="js/jq.js"></script>
    <script src="js/toster.js"></script>
    <script src="js/main.js"></script>



</head>

<body class="bg-" dir="rtl">
    <h1 style="text-align: center;"> صفحة الدخول </h1>

    <div class="row" style="margin-top: 50px;">

        <div class="col-sm-4"></div>
        <div class="col-sm-4">

            <div class="card">
                <div class="card-header bg-Dark" style="text-align: center; color: white;">نموذج الدخول</div>
                <div class="card-body bg-warning">
                    <form action="" method="POST">
                        <input type="text" name="mobile" value="" class="form-control" placeholder="ادخل رقم المستخدم" required />
                        <input type="password" name="pass" value="" class="form-control" placeholder="ادخل كلمة المرور" style="margin-top: 20px;" />
                        <center><input type="submit" name="enter" value="تسجيل الدخول" class="btn btn-Dark" style="margin-top: 20px;"></center>
                        <a href="signup.php"> انشاء حساب</a>


                        <br><br>
                        <?php
                        include_once('db.php');

                        if (isset($_POST['enter'])) {
                            $id = $_POST['mobile'];
                            $pass = $_POST['pass'];

                            if (!empty($id)) {

                                if (!empty($pass)) {

                                    if (is_numeric($id)) {
                                        $userData = mysqli_query($con, "SELECT `name`,`address` FROM `t_user` WHERE `mobile` = '$id' and `pass` ='$pass' ");
                                        $userData = mysqli_fetch_assoc($userData);
                                        if (!empty($userData)) {
                                            echo $userData['name'];
                                            echo "<br>";
                                            $variable1 = "$id";
                                            $variable2 = "$pass";
                                            setcookie("variable1", $variable1, time() + (86400 * 30), "/"); // 86400 ثانية = يوم واحد
                                            setcookie("variable2", $variable2, time() + (86400 * 30), "/"); // يمكن تعيين الوقت حسب الحاجة
                                            header("Location: other_page.php");

                                            header("Location: T_User.php");
                                            echo $userData['address'];
                                        } else {
                                            echo "هذا المستخدم غير موجود هل تريد انشاء حساب؟";
                                        }
                                    } else {
                                        echo "يجب ادخال قيمة رقمية في خانة رقم المستخدم";
                                    }
                                } else {
                                    echo "يجب ادخال كلمة المرور";
                                }
                            } else {
                                echo "يجب ادخال رقم الهاتف";
                            }
                        }


                        ?>


                    </form>

                </div>


            </div>
        </div>
        <div class="offset-4"></div>

    </div>
</body>