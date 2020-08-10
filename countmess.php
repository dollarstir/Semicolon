<?php
include 'db.php';
$uid = $_GET['uid'];

$getmess = mysqli_query($conn,"SELECT * FROM messages WHERE receiver='$uid' AND status='unread'");

$count = mysqli_num_rows($getmess);

echo $count;
?>
