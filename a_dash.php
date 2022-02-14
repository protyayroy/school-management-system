<?php
require_once "db_con.php";
session_start();
if (!isset($_SESSION["AID"])) {
    header("location:admin_login.php?msg=access denied");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
                        <a class="nav-link" href="a_dash.php"><?= ucfirst($_SESSION["ANAME"]); ?> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_dash.php?page=admin_setting">Setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_logout.php">Logout</a>
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
                <div class="col-md-4 side">
                    <?php require_once "sidenav.php"; ?>
                </div>
                <div class="col-md-8" >
                    <h4 class="text-center">
                        Welcome <?= ucfirst($_SESSION["ANAME"]); ?>
                    </h4>
                    <hr>
                    <div class="page">
                        <?php
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"] . '.php';
                        }else{
                            $page = 'school_info.php';
                        }
                        if (file_exists($page)) {
                            require_once $page;
                        }
                        ?>
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