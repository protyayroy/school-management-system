<h4>Change Password</h4>
<div class="col-md-6 mt-4">
    <?php
    if (isset($_POST["submit"])) {
        $opass = $_POST["opass"];
        $s = "SELECT * FROM `admin` WHERE `APASS` = '$opass' && `AID` = {$_SESSION['AID']}";
        $q = mysqli_query($con, $s) or die("1st QUERY Failed");
        if ($q->num_rows > 0) {
            $npass = $_POST["npass"];
            $cpass = $_POST["cpass"];
            if ($npass != "" || $cpass != "") {
                if ($npass == $cpass) {
                    $s = "UPDATE `admin` SET `APASS`= '$npass' WHERE `AID` = {$_SESSION['AID']}";
                    if (mysqli_query($con, $s) or die("2nd QUERY Failed")) {
                        echo "<div class='success'>Password Update Successfully</div>";
                    }
                } else {
                    echo "<div class='error'>Confirm password does not match</div>";
                }
            } else {echo "<div class='error'>All fields are required</div>";}
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