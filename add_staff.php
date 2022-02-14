<div class="col-md-6">
    <h4>Add Subject Details</h4>
    <hr>
    <br>
    <?php
    require_once "db_con.php";
        if(isset($_POST["add"])){
            $sql = "INSERT INTO `staff`(`SNAME`, `QUA`, `SAL`) 
            VALUES ('{$_POST["sname"]}','{$_POST["qua"]}','{$_POST["sal"]}')";
            if($con->query($sql)){
                $_SESSION["seccess"] = "input success";
                echo $_SESSION["seccess"];
                unset($_SESSION["seccess"]);
            }else{echo "no";}
        }
    ?>
    <form action="" method="POST">
        <label for="cname">Staff Name</label>
        <input type="text" name="sname" class="form-control" required><br>

        <label for="cname">Qualification</label>
        <input type="text" name="qua" class="form-control" required><br>

        <label for="cname">Salary</label>
        <input type="text" name="sal" class="form-control" required><br>

        <input type="submit" class="btn btn-primary" name="add" value="Add Staff">
    </form>
</div>