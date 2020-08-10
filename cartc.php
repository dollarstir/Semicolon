<?php
include 'db.php';
$uid = $_GET['uid'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");

$count = mysqli_num_rows($getcart);

echo $count;
?>
