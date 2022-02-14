<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>

    <!-- css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="container ">
        <div class="col-md-6 bg-warning m-auto px-0 pb-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a class="navbar-brand" href="#">School Management System</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admin_login.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Teacher</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="bg_img text-center pt-3">
                <div class="col-md-10 m-auto">
                    <h3 class="bg_txt bg-warning">School Management System</h3>
                </div>
            </div>
            <?php if (isset($_GET["msg"])) {
                echo "<div class='error mb-2'>{$_GET["msg"]}</div>";
            } ?>

            <div class="col-md-8 offset-2 px-4 form_part">
                <h4 class="text-center">Admin Login</h4>
                <?php
                require_once "db_con.php";
                session_start();
                if (isset($_POST["login"])) {
                    if ($_POST["name"] == "" || $_POST["password"] == "") {
                        header("location:admin_login.php?msg=All fields are required");
                        // echo "<script>alert('All fields are required')</script>";
                    } else {
                        $sql = "SELECT * FROM `admin` WHERE `ANAME`='{$_POST["name"]}' and `APASS`='{$_POST["password"]}'";
                        $res = $con->query($sql);

                        if ($r = $res->num_rows > 0) {
                            // $u_login = $_SESSION['user_login'];
                            $row = $res->fetch_assoc();
                            $_SESSION['AID'] = $row['AID'];
                            $_SESSION['ANAME'] = $row['ANAME'];
                            header("location:a_dash.php");
                            // echo "<script> window.open('a_dash.php','_self');</script>";
                        } else {
                            header("location:admin_login.php?msg=Wrong Information...Login Again");
                        }
                    }
                }
                ?>

                <form method="POST" action="" class="clearfix">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group  float-right">
                        <input type="submit" class="btn btn-primary mb-5" id="err" name="login" value="Login">
                    </div>
                    <div class="reg">
                        <p>Don't have account? <a href="admin_reg_form.php">Register Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- js file -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>