<?php
include 'db.php';
$uid = $_GET['uid'];

$getnot = mysqli_query($conn,"SELECT * FROM notification WHERE madeto='$uid' AND status='unread'");

$count = mysqli_num_rows($getnot);

echo $count;
?>
