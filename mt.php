<?php

include 'db.php';
$uid = $_GET['uid'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");
$total= 0;
while ($row= mysqli_fetch_array($getcart)) {
    $prodid= $row['prodid'];

    $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
    $r2 = mysqli_fetch_array($gtp);

    $total = $total + floatval($r2['price']);

    


    # code...
}

echo'<p>
<span>Total :</span>$'.$total.'</p>';
?>
