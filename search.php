
<?php
$search = $_POST["s_name"];
require_once "db_con.php";

$sql = "SELECT * FROM `staff` WHERE SNAME LIKE '%{$search}%'";
$res = $con->query($sql) or die("Query failed");
$output = "";
if ($res->num_rows > 0) {
    $i = 0;
    $output .= '
    <tr class="text-center">
        <th>S.No</th>
        <th>Staff Name</th>
        <th>Qualification</th>
        <th>Salary</th>
        <th>Delete</th>
    </tr>';
    while ($r = $res->fetch_assoc()) {
        $i++;
        // $_SESSION["staffname"]=$r["SNAME"];
        $output .= "<tr class ='text-center'>
        <td>{$i}</td>
        <td>{$r["SNAME"]}</td>
        <td>{$r["QUA"]}</td>
        <td>{$r["SAL"]}</td>
        <td><a href='' class='btn btn-danger del'data-id={$r["SID"]}>Delete</a></td>
    </tr>";
    }
    mysqli_close($con);
    echo $output;
    // print_r($output);
} else {
    echo "<h2>Result not found</h2>";
}
?>
