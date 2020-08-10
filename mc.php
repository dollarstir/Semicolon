<?php

include 'db.php';
$uid = $_GET['uid'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");
while ($row= mysqli_fetch_array($getcart)) {
    $prodid= $row['prodid'];

    $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
    $r2 = mysqli_fetch_array($gtp);

    echo'<div class="cart_product"> 
    <div class="product__info">
        <div class="thumbn">
            <img src="thumbnails/'.$r2['thumbnail'].'" alt="cart product thumbnail">
        </div>

        <div class="info">
            <a class="title" href="product/'.$r2['id'].'">'.$r2['item'].'</a>
            <div class="cat">
                <a href="index.php#">
                    <img src="images/catword.png" alt="">'.$r2['category'].'</a>
            </div>
        </div>
    </div>

    <div class="product__action">
        <form class="delcartfrm" method="POST"> 
        
            <input type="hidden" name="cid" value="'.$row['id'].'">

            <button style="border:none;" id="dbtn">
                <span class="lnr lnr-trash" style="color:red;"></span>
            </button>
        </form>
        
            
        
        <p>$'.$r2['price'].'</p>
    </div>
</div>';


    # code...
}
?>
