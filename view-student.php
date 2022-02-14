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

                <div class="col-md-12">
                    <h4 class="text-center">
                        Welcome <?= ucfirst($_SESSION["teachername"]); ?>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>View Students Details</h4><br>
                            <?php if(isset($_GET["sm"])){ echo "<div class='success'>{$_GET["sm"]}</div>";} ?>
                            <table class="table-bordered w-100">
                                <tr class="text-center">
                                    <th>S.Id</th>
                                    <th>Name</th>
                                    <th>Reg No.</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Address</th>
                                    <th>Contuct</th>
                                    <th>Gender</th>
                                    <th>Date Of Bath</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Photo</th>
                                    <th>Delete</th>
                                </tr>

                                <?php
                                $s = "SELECT * FROM `student` WHERE `TID` = {$_SESSION["TID"]}";
                                $q = $con->query($s) or die("QUERY Failed");
                                if ($q->num_rows > 0) {
                                    $i = 0; 
                                    while ($r = $q->fetch_assoc()) {
                                        $i ++ ;
                                        $_SESSION["student_reg"]=$r["SREG"];
                                        $_SESSION["student_cla"]=$r["SCLA"];
                                ?>
                                        <tr class="text-center" style="height: 50px;">
                                            <td><?= $i ?></td>
                                            <td><?= ucfirst($r["SNAME"]) ?></td>
                                            <td><?= ucfirst($r["SREG"]) ?></td>
                                            <td><?= ucfirst($r["FNAME"]) ?></td>
                                            <td><?= ucfirst($r["MNAME"]) ?></td>
                                            <td><?= ucwords($r["PADD"], ",") ?></td>
                                            <td><?= ucfirst($r["PCON"]) ?></td>
                                            <td><?= ucfirst($r["SGEN"]) ?></td>
                                            <td><?= ucfirst($r["DOB"]) ?></td>
                                            <td><?= ucfirst($r["SCLA"]) ?></td>
                                            <td><?= ucfirst($r["SSEC"]) ?></td>
                                            <td><img src="student_image/<?= $r["SIMG"] ?>" alt="" style="height: 80px;" class="mx-2"></td>
                                            <td><a href="student_delete.php?id=<?= $r["SID"] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>
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