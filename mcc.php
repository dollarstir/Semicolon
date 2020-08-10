<?php

include 'db.php';
$uid = $_GET['uid'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");
while ($row= mysqli_fetch_array($getcart)) {
    $prodid= $row['prodid'];

    $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
    $r2 = mysqli_fetch_array($gtp);

    echo'<div class="col-md-12">
    <div class="single_product clearfix">
        <div class="col-lg-5 col-md-7 v_middle">
            <div class="product__description">
                <img src="thumbnails/'.$r2['thumbnail'].'" alt="Purchase image" style="width:100px;height:100px;">
                <div class="short_desc">
                    <a href="product/'.$r2['id'].'">
                        <h4>'.$r2['item'].'</h4>
                    </a>
                    <p>';
                    $txt = $r2['description'];
                // $txt = strip_tags($txt);
                if (strlen($txt) > 60) {

                    // truncate string
                    $stringCut = substr($txt, 0, 60);
                    $endPoint = strrpos($stringCut, ' ');
                
                    //if the string doesn't contain any space then it will cut without word basis.
                    $txt = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $txt = $txt.' ....';
                    
                }

                echo $txt.'
                    </p>
                </div>
            </div>
            <!-- end /.product__description -->
        </div>
        <!-- end /.col-md-5 -->

        <div class="col-lg-3 col-md-2 v_middle">
            <div class="product__additional_info">
                <ul>
                    <li>
                        <a href="cart.html#">
                            <img src="images/catword.png" alt="">'.$r2['category'].'</a>
                    </li>
                </ul>
            </div>
            <!-- end /.product__additional_info -->
        </div>
        <!-- end /.col-md-3 -->

        <div class="col-lg-4 col-md-3 v_middle">
            <div class="product__price_download">
                <div class="item_price v_middle">
                    <span>$'.$r2['price'].'</span>
                </div>
                <div class="item_action v_middle">
                <form class="delcartfrm" method="POST" action"cart.php"> 
        
                <input type="hidden"  name="cid" value="'.$row['id'].'">
    
                <button style="border:none;" id="dbtn" name="dbtn">
                    <span class="lnr lnr-trash" style="color:red;"></span>
                </button>
            </form>

           
            
                </div>
                <!-- end /.item_action -->
            </div>
            <!-- end /.product__price_download -->
        </div>
        <!-- end /.col-md-4 -->
    </div>
    <!-- end /.single_product -->
</div>';


    # code...
}
?>
