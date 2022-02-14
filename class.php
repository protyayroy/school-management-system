<div class="row">
    <div class="col-md-6">
        <h4>Add Class Details</h4>
        <hr>
        <br>
        <?php
        require_once "db_con.php";

        if (isset($_POST["add"])) {
            $sql = "INSERT INTO `class`(`CNAME`, `SEC`) VALUES ('{$_POST["cname"]}','{$_POST["sec"]}')";

            if ($con->query($sql)) {
            } else {
                echo "no";
            }
        }

        ?>
        <form action="" method="POST">
            <label for="cname">Class Name</label>
            <select name="cname" id="cname" class="form-control" required>
                <option value="">Select</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
            </select>
            <br>
            <label for="sec">Section</label>
            <select name="sec" id="sec" class="form-control" required>
                <option value="">Select</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
            </select><br>
            <input type="submit" class="btn btn-primary" name="add" value="Add Class">
        </form>
    </div>
    <div class="col-md-6">
        <h4>Class Details</h4>
        <hr>
        <table class="table table-striped table-bordered mb-5">
            <tr class="text-center">
                <th>S.No</th>
                <th>Class Name</th>
                <th>Section</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `class`";
                $res = $con->query($sql);
                if($res->num_rows>0){
                    $i = 0;
                    while($r = $res->fetch_assoc()){
                        $i++;

            ?>
            <tr class="text-center">
                <td><?= $i ?></td>
                <td><?= $r["CNAME"] ?></td>
                <td><?= $r["SEC"] ?></td>
                <td><a href='c_delete.php?id=<?= base64_encode($r["ID"])?>' class="btn btn-danger">Delete</a></td>
            </tr>
            <?php }} ?>
        </table>
    </div>
</div>