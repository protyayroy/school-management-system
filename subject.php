<div class="row">
    <div class="col-md-6">
        <h4>Add Subject Details</h4>
        <hr>
        <br>
        <?php
        require_once "db_con.php";
        if(isset($_POST["add"])){
            $sql ="INSERT INTO `sub`(`SUB`) VALUES ('{$_POST["sub"]}')";
            $res = $con->query($sql);
        }
        ?>
        <form action="" method="POST">
            <label for="cname">Subject Name</label>
            <input type="text" name="sub" class="form-control" required>
            <br>
            <input type="submit" class="btn btn-primary" name="add" value="Add Subject">
        </form>
    </div>
    <div class="col-md-6">
        <h4>Subject Details</h4>
        <hr>
        <table class="table table-striped table-bordered mb-5">
            <tr class="text-center">
                <th>S.No</th>
                <th>Subject Name</th>
                <th>Delete</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `sub`";
                $res = $con->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($r=$res->fetch_assoc()){
                        $i++;
            ?>
            <tr class="text-center">
                <td><?= $i; ?></td>
                <td><?= ucfirst($r["SUB"]); ?></td>
                <td><a href='s_delete.php?id={<?= base64_encode($r["SID"]) ?>}' class="btn btn-danger">Delete</a></td>
            </tr>
            <?php }}?>
        </table>
    </div>
</div>