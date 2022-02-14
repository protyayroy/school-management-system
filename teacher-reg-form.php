<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ad_heading text-center mt-4">
                <h2>Teacher Registration Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis pariatur quos quasi aperiam eveniet repellendus distinctio quam quis quidem. Quibusdam.
                    <span class="d-block"><i><b>To know more about our school,Please register this form.</b></i></span>
                </p>
            </div>
            <div class="col-md-6 offset-3 mt-3 bg-dark text-white py-3">
                <?php
                require_once "db_con.php";
                if (isset($_POST["reg"])) {
                    $name = $_POST["name"];
                    $pass = $_POST["pass"];
                    $cpass = $_POST["cpass"];
                    $img = explode(".", $_FILES["t-img"]["name"]);
                    $img = end($img);
                    $img_name = $name . "." . $img;
                    // print_r($img);exit();
                    $input_err = array();
                    if ($name != "") {
                        if ($pass != "") {
                            if ($img != "") {
                                if ($pass == $cpass) {
                                    $s = "INSERT INTO `teacher`(`TNAME`, `TPASS`, `TIMG`) VALUES ('$name','$pass','$img_name')";
                                    if ($con->query($s) or die("QUERY Failed")) {
                                        move_uploaded_file($_FILES["t-img"]["tmp_name"], "teacher-img/" . $img_name);
                                        header("location:index.php?msgs=Registration Successful");
                                        $name = "";
                                        $pass = "";
                                    }
                                } else {
                                    $input_err["pass"] = "Password does not match";
                                    echo "<div class='error'>{$input_err["pass"]}</div>";
                                }
                            } else {
                                $input_err["img"] = "Image are required";
                                echo "<div class='error'>{$input_err["img"]}</div>";
                            }
                        } else {
                            $input_err["pass"] = "Password field are required";
                            echo "<div class='error'>{$input_err["pass"]}</div>";
                        }
                    } else {
                        $input_err["name"] = "Name field are required";
                        echo "<div class='error'>{$input_err["name"]}</div>";
                    }
                }
                ?>

                <form id="admin_form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Enter Your Name</label>
                        <input type="text" class="form-control" name="name" value="<?php if (isset($name)) {
                                                                                        echo $name;
                                                                                    } ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Enter Your Password</label>
                        <input type="text" class="form-control" name="pass" value="<?php if (isset($pass)) {
                                                                                        echo $pass;
                                                                                    } ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Your Password</label>
                        <input type="text" class="form-control" name="cpass">
                    </div>
                    <div class="form-group">
                        <label for="name">Please give us your own picture and it will be clear.</label><br>
                        <input type="file" name="t-img">
                    </div>
                    <div class="form-group mt-4 clearfix">
                        <input type="submit" class="btn btn-primary" value="Register Here" name="reg">
                        <span class="float-right">
                            If you have an account ? <a href="index.php">login here</a>
                        </span>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>