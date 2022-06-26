<?php
require ('sduCon.php');
// รับค่าจาก jQuery
$Search = $_POST['Search'];
$result = mysqli_query($conn, "SELECT * FROM subject WHERE subject_id LIKE '$Search'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    $data[] = $row;
}
echo json_encode($data);
?>
