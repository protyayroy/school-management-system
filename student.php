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
                            <h4>Add Student Details</h4>
                        </div>
                        <div class="col-md-12 PX-0">
                            <?php
                            if (isset($_POST["add"])) {
                                $sname = $_POST["sname"];
                                $sreg = $_POST["sreg"];
                                $fname = $_POST["fname"];
                                $mname = $_POST["mname"];
                                $dob = $_POST["day"] . '-' . $_POST["mnth"] . '-' . $_POST["yr"];
                                $pcon = $_POST["pcon"];
                                $gender = $_POST["gender"];
                                // if (empty($gender)){ $gender="";} how to validate type="radio"???
                                $padd = $_POST["padd"];
                                $cla = $_POST["cla"];
                                $sec = $_POST["sec"];
                                $simg = explode(".", $_FILES["simg"]["name"]);
                                $simg = end($simg);
                                $s_img_name = $sname . "." . $simg;
                                $s = "INSERT INTO `student`(`SNAME`, `SREG`, `FNAME`, `MNAME`, `DOB`,`PCON`, 
                                 `SGEN`, `PADD`, `SCLA`, `SSEC`, `SIMG`, `TID`) 
                                VALUES ('$sname','$sreg','$fname','$mname','$dob','$pcon',
                                '$gender','$padd','$cla','$sec','$s_img_name',{$_SESSION["TID"]})";
                                if ($gender != "") {
                                    if (mysqli_query($con, $s) or die("QUERY Failed")) {
                                        echo "<div class='success'>Details added successful</div>";
                                        move_uploaded_file($_FILES["simg"]["tmp_name"], "student_image/" . $s_img_name);
                                        // $sname="";$sreg="";$fname="";$mname="";$dob="";$pcon="";$gender="";
                                        // $padd="";$cla="";$sec="";$s_img_name="";
                                    }
                                }else{echo "<div class='error'>Select Gender</div>"; };
                            }
                            ?>
                            <form action="student.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sname">Student Name</label>
                                            <input type="text" id="sname" class="form-control" name="sname">
                                        </div>
                                        <div class="form-group">
                                            <label for="sreg">Registration Number</label>
                                            <input type="number" id="sreg" class="form-control" name="sreg">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">Father's Name</label>
                                            <input type="text" id="fname" class="form-control" name="fname">
                                        </div>
                                        <div class="form-group">
                                            <label for="mname">Mother's Name</label>
                                            <input type="text" id="mname" class="form-control" name="mname">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Student Date Of Bath</label>
                                            <div class="date-group">
                                                <select name="day" class="custom-select date">
                                                    <option value="">Day</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                                <select name="mnth" class="custom-select date">
                                                    <option value="">Month</option>
                                                    <option value="Jan">Jan</option>
                                                    <option value="Feb">Feb</option>
                                                    <option value="Mar">Mar</option>
                                                    <option value="Apr">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="Jul">Jul</option>
                                                    <option value="Aug">Aug</option>
                                                    <option value="Sep">Sep</option>
                                                    <option value="Oct">Oct</option>
                                                    <option value="Nov">Nov</option>
                                                    <option value="Dec">Dec</option>
                                                </select>
                                                <select name="yr" class="custom-select date">
                                                    <option value="">Year</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pcon">Parent's Contuct</label>
                                            <input type="text" id="pcon" class="form-control" name="pcon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mr-3">Gender:</label>
                                            <input type="radio" id="Male" name="gender" value="Male">
                                            <label for="Male">Male</label>
                                            <input type="radio" id="Female" name="gender" value="Female">
                                            <label for="Female">Female</label>
                                            <input type="radio" id="Other" name="gender" value="Other">
                                            <label for="Other">Other</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="padd">Permanent Address</label><br>
                                            <textarea name="padd" id="padd" cols="35" rows="3" class="w-100"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="cla">Class</label>
                                            <select name="cla" id="cla" class="custom-select">
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
                                            <label for="sec">Section</label>
                                            <select name="sec" id="sec" class="custom-select">
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
                                            <label for="simg">Student Image:</label>
                                            <input type="file" id="simg" name="simg" class="mt-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="submit" class="btn btn-primary reset" value="Add Details" name="add">
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