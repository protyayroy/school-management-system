<?php
require_once "db_con.php";
session_start();
if (!isset($_SESSION['TID'])) {
    header("location:index.php?msge=Access Denied..login Again");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>

    <!-- css file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">School Management System</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto t_menu">
                    <li class="nav-item">
                        <a class="nav-link" href="t_dash.php"><?= ucfirst($_SESSION["teachername"]); ?>'s Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher-setting.php">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="t_logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-flude body">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 image px-0">

                </div>
                <div class="col-md-4 t_side">
                    <?php require_once "t-sidenav.php"; ?>
                </div>
                <div class="col-md-8">
                    <h4 class="text-center">
                        Welcome <?= ucfirst($_SESSION["teachername"]); ?>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Change Password</h4>
                        </div>
                        <div class="col-md-6 mt-4">
                            <?php
                            if (isset($_POST["submit"])) {
                                $opass = $_POST["opass"];
                                $s = "SELECT * FROM `teacher` WHERE `TPASS` = '$opass' && `TID` = {$_SESSION['TID']}";
                                $q = mysqli_query($con, $s) or die("1st QUERY Failed");
                                if ($q->num_rows > 0) {
                                    $npass = $_POST["npass"];
                                    $cpass = $_POST["cpass"];
                                    if ($npass != "" || $cpass != "") {
                                        if ($npass == $cpass) {
                                            $s = "UPDATE `teacher` SET `TPASS`= '$npass' WHERE `TID` = {$_SESSION['TID']}";
                                            if (mysqli_query($con, $s) or die("2nd QUERY Failed")) {
                                                echo "<div class='success'>Password Update Successfully</div>";
                                            }
                                        } else {
                                            echo "<div class='error'>Confirm password does not match</div>";
                                        }
                                    } else {
                                        echo "<div class='error'>All fields are required</div>";
                                    }
                                } else {
                                    echo "<div class='error'>Password not match</div>";
                                }
                            }

                            ?>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="name">Old Password</label>
                                    <input type="text" class="form-control" id="opass" name="opass">
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="text" class="form-control" id="npass" name="npass">
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="text" class="form-control" id="cpass" name="cpass">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary mb-5" id="submit" name="submit" value="Change Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer  bg-primary text-center text-white my-4" style="height: 50px; line-height: 50px;">Copyright &#xa9; Protyay roy</div>
    <!-- js file -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>