<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher login</title>

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

            <div class="col-md-8 offset-2 px-4 form_part">
                <h4 class="text-center">Teacher Login</h4>
                
                <?php if (isset($_GET["msgs"])) {
                    echo "<div class='success'>{$_GET["msgs"]}</div>";
                }  ?>
                <?php if (isset($_GET["msge"])) {
                    echo "<div class='error'>{$_GET["msge"]}</div>";
                }  ?>

                <?php
                require_once "db_con.php";
                session_start();
                if (!isset($_SESSION['TID'])){
                    // header("location:index.php?msg=");
                    // echo "<div class='error'>Access Denied..login Again</div>";

                }

                if (isset($_POST["login"])){
                    $name = $_POST["name"];
                    $password = $_POST["password"];
                    $s = "SELECT * FROM `teacher` WHERE `TNAME` = '$name' && `TPASS` = '$password'";
                    $q = $con->query($s) or die ("QUERY Failed");
                    if($q->num_rows > 0){
                        $r = $q->fetch_assoc();
                        $_SESSION["teachername"] = $r["TNAME"];
                        $_SESSION["TID"] = $r["TID"];
                        header("location:t_dash.php");
                    }else{
                        echo "<div class='error'>Wrong Information...login again ?</div>";
                    }
                }
                
                
                ?>
                <form method="POST" action="index.php" class="clearfix">
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
                        <p>Don't have account? <a href="teacher-reg-form.php">Register Here</a></p>
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