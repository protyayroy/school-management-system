<h5 class="mb-3">Set Exam Time Table Details</h5>

<?php
if (isset($_POST["set_exam"])) {
    $ename = $_POST["ename"];
    $etype = $_POST["etype"];
    $edate = $_POST["day"] . "-" . $_POST["mnth"] . "-" . $_POST["yr"];
    $sec = $_POST["sec"];
    $cla = $_POST["cla"];
    $sub = $_POST["sub"];

    $err = array();
    if ($ename == "") {
        $err["ename"] = "Exam Name field are required";
    }
    if ($etype == "") {
        $err["etype"] = "Exam Term field are required";
    }
    if ($_POST["day"] == "" || $_POST["mnth"] == "" || $_POST["yr"] == "") {
        $err["edate"] = "Date field are required";
    }
    if ($sec == "") {
        $err["sec"] = "Session field are required";
    }
    if ($cla == "") {
        $err["cla"] = "Class field are required";
    }
    if ($sub == "") {
        $err["sub"] = "Subject field are required";
    }
    if (count($err) == 0) {
        $s = "INSERT INTO `exam`(`ENAME`, `ETYPE`, `EDATE`, `SEA`, `CLA`, `SUB`) 
        VALUES ('$ename','$etype','$edate','$sec','$cla','$sub')";
        $q = mysqli_query($con, $s) or die("QUERY Failed");
        if ($q) {
            $success = "Successfully set exam time";
        }
    }
}

?>

<?php if (isset($success)) {
    echo "<div class='success'>$success</div>";
} ?>
<form action="" method="POST" id="resetForm">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Exam Name</label>
                <input type="text" class="form-control" name="ename">
                <?php if (isset($err["ename"])) {
                    echo "<div class='error'>{$err["ename"]}</div>";
                } ?>
            </div>
            <div class="form-group">
                <label for="name">Select Term</label>
                <select name="etype" class="custom-select">
                    <option value="">Select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                </select>
                <?php if (isset($err["etype"])) {
                    echo "<div class='error'>{$err["etype"]}</div>";
                } ?>
            </div>
            <div class="form-group">
                <label for="name">Select Exam Date</label>
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
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                    <?php if (isset($err["edate"])) {
                        echo "<div class='error'>{$err["edate"]}</div>";
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Session</label>
                <select name="sec" class="custom-select">
                    <option value="">Select</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                </select>
                <?php if (isset($err["sec"])) {
                    echo "<div class='error'>{$err["sec"]}</div>";
                } ?>
            </div>
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
                <?php if (isset($err["cla"])) {
                    echo "<div class='error'>{$err["cla"]}</div>";
                } ?>
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
                <?php if (isset($err["sub"])) {
                    echo "<div class='error'>{$err["sub"]}</div>";
                } ?>
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="submit" class="btn btn-primary reset" value="Add Exam Date" name="set_exam">
    </div>
</form>

<script>
    // $(document).ready(function() {

    //     $(".reset").on("click", function(e) {
    //         e.preventDefault();
    //         if ($success == "Successfully set exam time") {
    //             $("#resetForm").trigger("reset");
    //         }

    //     });
    // });
</script>