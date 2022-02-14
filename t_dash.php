<?php
require_once "db_con.php";
session_start();
if (!isset($_SESSION['TID'])){
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
                        <div class="col-sm-12">
                            <h4>Add Profile</h4>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST["submit"])) {
                                $ph = $_POST["ph"];
                                $tmail = $_POST["tmail"];
                                $add = $_POST["add"];
                                $sal = $_POST["sal"];
                                $s = "UPDATE `teacher` SET `PH`='$ph',`TMAIL`='$tmail',`ADRS`='$add',`TSAL`='$sal' 
                                WHERE `TID` = {$_SESSION["TID"]} && `TNAME` = '{$_SESSION["teachername"]}'";
                                if (mysqli_query($con, $s) or die("QUERY Failed")) {
                                    echo "<div class='success'>Details added successful</div>";
                                }
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="ph">Phone Number</label>
                                    <input type="text" id="ph" class="form-control" name="ph">
                                </div>
                                <div class="form-group">
                                    <label for="mail">E-mail</label>
                                    <input type="text" id="mail" class="form-control" name="tmail">
                                </div>
                                <div class="form-group">
                                    <label for="txt">Address</label><br>
                                    <textarea name="add" id="txt" cols="34" rows="3" class="w-100"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sal">Salary</label>
                                    <input type="text" id="sal" class="form-control" name="sal">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Profile Details">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Profile Details</h5>
                            <?php
                            $s = "SELECT * FROM `teacher` WHERE `TID` = {$_SESSION["TID"]} && `TNAME` = '{$_SESSION["teachername"]}'";
                            $q = $con->query($s) or die("QUERY Failed");
                            if ($q->num_rows > 0) {
                                while ($r = $q->fetch_assoc()) {
                            ?>
                                    <table class="table-bordered w-100">
                                        <tr class="text-center">
                                            <th>Image</th>
                                            <td><img src="teacher-img/<?= $r["TIMG"] ?>" alt="" style="height: 100px;"></td>
                                        </tr>
                                        <tr class="text-center"  style="height: 50px;">
                                            <th>Name</th>
                                            <td><?= ucfirst($r["TNAME"]) ?></td>
                                        </tr>
                                        <tr class="text-center" style="height: 50px;">
                                            <th>Salary</th>
                                            <td><?= $r["TSAL"] ?></td>
                                        </tr>
                                        <tr class="text-center" style="height: 50px;">
                                            <th>E-mail</th>
                                            <td><?= $r["TMAIL"] ?></td>
                                        </tr>
                                        <tr class="text-center" style="height: 50px;">
                                            <th>Address</th>
                                            <td><?= ucwords($r["ADRS"],",") ?></td>
                                        </tr>
                                        <tr class="text-center" style="height: 50px;">
                                            <th>Phone No</th>
                                            <td><?= $r["PH"] ?></td>
                                        </tr>
                                    </table>
                            <?php }
                            } ?>
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