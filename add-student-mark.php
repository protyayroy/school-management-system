<?php
require_once "db_con.php";
session_start();
if (!isset($_SESSION['TID'])) {
    header("location:index.php?msge=Access Denied..login Again");
}
if(isset($_GET["vreg"])){
    $s = "SELECT * FROM `student` WHERE `SREG` = '{$_GET["vreg"]}'";
    $q = $con->query($s) or die("QUERY Failed");
    if ($q->num_rows > 0) {
        $r = $q->fetch_assoc();
        $vreg = $_GET["vreg"];
    }else{ header("location:add-mark.php?err=Registration Number does not match");}
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
                        <div class="col-sm-12 mb-3">
                            <h4>Add Student Mark</h4>
                        </div>
                        <div class="col-md-12">
                        <?php
                            
                            if (isset($_POST["submit"])){
                                $reg = $_POST["reg"];
                                $cla = $_POST["cla"];
                                $term = $_POST["term"];
                                $sub = $_POST["sub"];
                                $mark = $_POST["mark"];
                                $s = "INSERT INTO `mark`(`MREG`, `MCLA`, `MTYPE`, `MSUB`, `MARK`) 
                                VALUES ('$reg','$cla','$term','$sub','$mark')";
                                if($con->query($s) or die("QUERY Failed")){
                                    echo '<div class="success">Marks Add Successful</div>';
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="reg">Registration Number</label>
                                            <input type="text" id="reg" class="form-control" name="reg" value="<?= $r["SREG"] ?>" style="background-color: rgb(161, 161, 161);">
                                        </div>
                                        <div class="form-group">
                                            <label for="cla">Class</label>
                                            <input type="text" id="cla" class="form-control" name="cla" value="<?= $r["SCLA"] ?>" style="background-color: rgb(161, 161, 161);">
                                        </div>
                                        <div class="form-group">
                                            <label for="term">Select Term</label>
                                            <select name="term" class="custom-select" id="term">
                                                <option value="">Select</option>

                                                <?php
                                                $s = "SELECT DISTINCT ETYPE FROM exam";
                                                $q = mysqli_query($con, $s) or die("QUERY Failed");
                                                if ($q->num_rows > 0) {
                                                    while ($r = $q->fetch_assoc()) {
                                                ?>
                                                        <option value="<?= $r["ETYPE"]; ?>"><?= $r["ETYPE"]; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub">Subject</label>
                                            <select name="sub" class="custom-select" id="sub">
                                                <option value="">Select</option>

                                                <?php
                                                $s = "SELECT DISTINCT SUB FROM sub";
                                                $q = mysqli_query($con, $s) or die("QUERY Failed");
                                                if ($q->num_rows > 0) {
                                                    while ($r = $q->fetch_assoc()) {
                                                ?>
                                                        <option value="<?= $r["SUB"]; ?>"><?= $r["SUB"]; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mark">Mark</label>
                                            <input type="text" id="mark" class="form-control" name="mark">
                                        </div>
                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-primary" name="submit" value="Add Mark">
                                        </div>
                                    </div>
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