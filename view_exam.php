<h5>View Exam Time Table Details</h5>
<table class="table-bordered table table-striped mt-4">
    <tr class="text-center">
        <th>S.No</th>
        <th>Cless</th>
        <th>Subject</th>
        <th>Exam Name</th>
        <th>Term</th>
        <th>Date</th>
        <th>Session</th>
        <th>Delete</th>
    </tr>

    <?php
    $s = "SELECT * FROM `exam`";
    $q = mysqli_query($con, $s) or die("QUERY Failed");
    if ($q->num_rows > 0) {
        $i = 0;
        while ($r = $q->fetch_assoc()) {
            $i++;
            echo "
                <tr class='text-center'>
                    <td>{$i}</td>
                    <td>{$r["CLA"]}</td>
                    <td>{$r["SUB"]}</td>
                    <td>{$r["ENAME"]}</td>
                    <td>{$r["ETYPE"]}</td>
                    <td>{$r["EDATE"]}</td>
                    <td>{$r["SEA"]}</td>
                    <td><a href='exam_delete.php?id={$r["EID"]}' class='btn-danger btn edel'>Delete</a></td>
                </tr>";
        }
    }
    ?>
</table>

<script>
    // $(document).ready(function(){
    //     // $("#exam_delete").hide();
    //     $(".edel").on("click",function(e){
    //         // e.preventDefault();
    //         $(".exam_delete").show(5000);
    //         // alert("Do you want to delete this Exam date? ")
    //     });
    // });
</script>
