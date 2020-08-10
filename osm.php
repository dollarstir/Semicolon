<?php

include 'db.php';
$uid = $_GET['uid'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");
while ($row= mysqli_fetch_array($getcart)) {
    $prodid= $row['prodid'];

    $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
    $r2 = mysqli_fetch_array($gtp);

    echo'<li class="item">
    <a href="product/'.$r2['id'].' target="_blank">'.$r2['item'].'</a>
    <span>$'.$r2['price'].'</span>
</li>';


    # code...
}
?>
