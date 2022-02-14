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
                            <h4>Add Classes</h4>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_POST["submit"])) {
                                $cla = $_POST["cla"];
                                $sec = $_POST["sec"];
                                $sub = $_POST["sub"];
                                $s = "INSERT INTO `hclass`(`TID`, `HCLA`, `HSEC`, `HSUB`) 
                                VALUES ('{$_SESSION["TID"]}','$cla','$sec','$sub')";
                                if (mysqli_query($con, $s) or die("QUERY Failed")) {
                                    echo "<div class='success'>Details added successful</div>";
                                }
                            }
                            ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="name">Class</label>
                                    <select name="cla" class="custom-select">
                                        <option value="">Select</option>

                                        <?php
                                        $s = "SELECT DISTINCT CNAME FROM class";
                                        $q = mysqli_query($con, $s) or die("QUERY Failed");
                                        if ($q->num_rows > 0) {
                                            while ($r = $q->fetch_assoc()) {
                                        ?>
                                                <option value="<?= $r["CNAME"]; ?>"><?= $r["CNAME"]; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Section</label>
                                    <select name="sec" class="custom-select">
                                        <option value="">Select</option>

                                        <?php
                                        $s = "SELECT DISTINCT SEC FROM class";
                                        $q = mysqli_query($con, $s) or die("QUERY Failed");
                                        if ($q->num_rows > 0) {
                                            while ($r = $q->fetch_assoc()) {
                                        ?>
                                                <option value="<?= $r["SEC"]; ?>"><?= $r["SEC"]; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Subject</label>
                                    <select name="sub" class="custom-select">
                                        <option value="">Select</option>

                                        <?php
                                        $s = "SELECT * FROM `sub`";
                                        $q = mysqli_query($con, $s) or die("QUERY Failed");
                                        if ($q->num_rows > 0) {
                                            while ($r = $q->fetch_assoc()) {
                                        ?>
                                                <option value='<?= $r["SUB"]; ?>'><?= ucfirst($r["SUB"]); ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Details">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h5>Details</h5>
                            <?php if(isset($_GET["msg"])){ echo "<div class='success'>{$_GET["msg"]}</div>"; } ?>
                            <table class="table-bordered table-striped w-100">
                                <tr class="text-center"  style="height: 50px;">
                                    <th>S.No</th>
                                    <th>Class Name</th>
                                    <th>Section</th>
                                    <th>Subject</th>
                                    <th>Delete</th>
                                </tr>
                                <?php
                                $s = "SELECT * FROM `hclass`";
                                $q = $con->query($s) or die("QUERY Failed");
                                if ($q->num_rows > 0) {
                                    $i = 0;
                                    while ($r = $q->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <tr class="text-center">
                                            <td><?= $i ?></td>
                                            <td><?= ucfirst($r["HCLA"]) ?></td>
                                            <td><?= ucfirst($r["HSEC"]) ?></td>
                                            <td><?= ucfirst($r["HSUB"]) ?></td>
                                            <td><a href="class-delete.php?id=<?= $r["HID"] ?>" class="btn btn-danger">Delete</a></td>
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