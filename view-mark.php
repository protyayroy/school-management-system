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
                        <div class="col-sm-12">
                            <h4>View Student Marks</h4>
                        </div>
                        <div class="col-md-12">
                            <form action="" method="POST">
                                <div class="row mt-3">
                                    <div class="form-group col-md-6 w-100">
                                        <label for="cla">Registration Number</label>
                                        <input type="text" class="w-100" name="mreg">
                                    </div>
                                    <div class="form-class col-md-6 mt-4">
                                        <input type="submit" value="View Marks" class="btn btn-primary" name="v_stu">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12">


                            <?php
                            if (isset($_POST["v_stu"])) {
                                $mreg = $_POST["mreg"];
                                // echo $edate; exit();
                                $s = "SELECT * FROM `mark` WHERE `MREG` = '$mreg'";
                                $q = mysqli_query($con, $s) or die("QUERY Failed");
                                if ($q->num_rows > 0) {
                                    $i = 0;
                                    echo '
                                        <h5>Student Details</h5>
                                        <table class="table-bordered table table-striped mt-4">
                                        <tr class="text-center">
                                            <th>S.No</th>
                                            <th>Reg.No</th>
                                            <th>Cless</th>
                                            <th>Term</th>
                                            <th>Subject</th>
                                            <th>Mark</th>
                                        </tr>';
                                    while ($r = $q->fetch_assoc()) {
                                        $i++;
                                        echo "
                                            <tr class='text-center'>
                                                <td>{$i}</td>
                                                <td>{$r["MREG"]}</td>
                                                <td>{$r["MCLA"]}</td>
                                                <td>{$r["MTYPE"]}</td>
                                                <td>{$r["MSUB"]}</td>
                                                <td>{$r["MARK"]}</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<div class='error'><h5>No result found</h5></div>";
                                }
                                echo "</table>";
                            }
                            ?>
                            
                        </div>
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
    <!-- <script>
        $(document).ready(function() {

            $(".exam_table").hide();
            $(".show_exam").on("click",function(e){
                // e.preventDefault();
                $(".exam_table").show();
            })
            if($edate == ""){
            } else {  }
        })
    </script> -->
</body>

</html>