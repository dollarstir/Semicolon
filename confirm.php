<?php 


session_start();

if(!isset($_SESSION['id'])){
    echo '<script> 
    alert("please login first");
    
    window.location="login.php"</script>';
}
else{
    $mysession = $_SESSION['id'];

    $_SESSION['pid'] =$mysession;
  
    
    
}
include 'db.php';
include 'core.php';

$ptype= $_POST['filter_opt'];
if (empty($ptype)) {
    echo '<script>window.location="checkout.php"</script>';
    # code...
}


$getinfo = mysqli_query($conn,"SELECT * FROM users WHERE id ='".$_SESSION['id']."'");
$rrr= mysqli_fetch_array($getinfo);
extract($rrr);



$uid = $_SESSION['id'];

$getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND status='incart'");
$total= 0;
while ($rmm= mysqli_fetch_array($getcart)) {
    $prodid= $rmm['prodid'];

    $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
    $r2 = mysqli_fetch_array($gtp);

    $total = $total + floatval($r2['price']);

    




    # code...
}   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev- Dashboard Payment</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.css">

    <!-- endinject -->
    <!-- paypal js -->
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.aazztech.com/theme/html/martplace/dist/images/favicon.png">
</head>

<body class="preload checkout-page">

    <!--================================
        START MENU AREA
    =================================-->
    <!-- start menu-area -->
    <?php topbar();?>
    <!-- end /.menu-area -->
    <!--================================
        END MENU AREA
    =================================-->

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <a href="checkout.php">Checkout</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Payment</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="dashboard-area">
        <div class="dashboard_contents">
            <div class="container">
                
                    <div class="row">
                    <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                       
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-12">
                            <div class="information_module order_summary">
                                <div class="toggle_title">
                                    <h4>Order Summary</h4>
                                </div>

                                <ul>
                                <div class="mysum">
                                    
                                    </div>
                                    
                                    <li class="total_ammount">
                                        <p>Total</p>
                                        <span id="tt"></span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.information_module-->

                            <div class="information_module payment_options">
                                <div class="toggle_title">
                                    <h4>Selected Payment Method</h4>
                                </div>

                                <ul>
                                    <?php  
                                    
                                    if($ptype=='momo'){

                                       

                                       
                                        

                                        echo '<li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt" checked>
                                            <label for="opt1">
                                                <span class="circle"></span>Mobile Money/ Card</label>
                                        </div>
                                        <img src="images/momo.png" alt="Visa Cards" style="width:250px;">
                                    </li>';
                                    }
                                    elseif ($ptype=='paypal') {
                                        echo '<li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt" value="paypal" checked>
                                            <label for="opt2">
                                                <span class="circle"></span>Paypal</label>
                                        </div>
                                        <img src="images/paypal.png" alt="Visa Cards">
                                    </li>';
                                        # code...
                                    }
                                    elseif ($ptype=='yalldev') {

                                        echo'<li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt" value="yalldev" checked>
                                            <label for="opt3">
                                                <span class="circle"></span>YallDev Wallet</label>
                                        </div>
                                        <p>Balance
                                            <span class="bold">$180</span>
                                        </p>
                                    </li>';
                                        # code...
                                    }
                                    else {
                                        echo'<li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt" value="paypal" checked>
                                            <label for="opt2">
                                                <span class="circle"></span>No payment Selected</label>
                                        </div>
                                        
                                    </li>';
                                    }
                                    
                                     ?>


                                    <!-- <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt">
                                            <label for="opt1">
                                                <span class="circle"></span>Credit Card</label>
                                        </div>
                                        <img src="images/cards.png" alt="Visa Cards">
                                    </li> -->

                                    <!-- <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt">
                                            <label for="opt2">
                                                <span class="circle"></span>Paypal</label>
                                        </div>
                                        <img src="images/paypal.png" alt="Visa Cards">
                                    </li>

                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt">
                                            <label for="opt3">
                                                <span class="circle"></span>YallDev Wallet</label>
                                        </div>
                                        <p>Balance
                                            <span class="bold">$180</span>
                                        </p>
                                    </li> -->
                                </ul>

                                <div class="payment_info modules__content">
                                    <!-- <div class="form-group">
                                        <label for="card_number">Card Number</label>
                                        <input id="card_number" type="text" class="text_field" placeholder="Enter your card number here...">
                                    </div> -->

                                    <!-- lebel for date selection -->
                                    <!-- <label for="name">Expire Date</label>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="select-wrap select-wrap2">
                                                    <select name="months" id="name">
                                                        <option value="">Month</option>
                                                        <option value="jan">jan</option>
                                                        <option value="feb">Feb</option>
                                                        <option value="mar">Mar</option>
                                                        <option value="apr">Apr</option>
                                                        <option value="may">May</option>
                                                        <option value="jun">Jun</option>
                                                        <option value="jul">Jul</option>
                                                        <option value="aug">Aug</option>
                                                        <option value="sep">Sep</option>
                                                        <option value="oct">Oct</option>
                                                        <option value="nov">Nov</option>
                                                        <option value="dec">Dec</option>
                                                    </select>
                                                    <span class="lnr lnr-chevron-down"></span>
                                                </div> -->
                                                <!-- end /.select-wrap -->
                                            <!-- </div> -->
                                            <!-- end /.form-group -->
                                        <!-- </div> -->
                                        <!-- end /.col-md-6-->

                                        <!-- <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="select-wrap select-wrap2">
                                                    <select name="years" id="years">
                                                        <option value="">Year</option>
                                                        <option value="28">2028</option>
                                                        <option value="27">2027</option>
                                                        <option value="26">2026</option>
                                                        <option value="25">2025</option>
                                                        <option value="24">2024</option>
                                                        <option value="23">2023</option>
                                                        <option value="22">2022</option>
                                                        <option value="21">2021</option>
                                                        <option value="20">2020</option>
                                                        <option value="19">2019</option>
                                                        <option value="18">2018</option>
                                                        <option value="17">2017</option>
                                                    </select> -->
                                                    <!-- <span class="lnr lnr-chevron-down"></span> -->
                                                <!-- </div> -->
                                                <!-- end /.select-wrap -->
                                            <!-- </div> -->
                                            <!-- end /.form-group -->
                                        <!-- </div> -->
                                        <!-- end /.col-md-6-->
                                    <!-- </div> -->
                                    <!-- end /.row -->

                                    
                                </div>
                            </div>
                            <!-- end /.information_module-->
                        </div>
                        <!-- end /.col-md-6 -->
                    </div>
                    <!-- end /.row -->
                
                <!-- <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                           
                                            <script src="https://js.paystack.co/v1/inline.js"></script> 
                                           <center> <button type="buton" class="btn btn--round btn--default" onclick="payWithPaystack()">Buy Now</button><center>
                                        </div>
                                    </div>
                </form> -->



                <?php
            $mmm = preg_split("/ /",$name);
        
        $fname = $mmm[0];
        $lname = $mmm[1];
        $email = $email;
        $amount = $total;
        $r1 = 'DS';
        $r2= rand(1111111,9999999);
        $myref = $r1.''.$r2;
        
        ?>
        
                                   
        
        <form id="paymentForm">

                                    <?php
                                            if($ptype=='momo'){

                                                echo '<div class="row">
                                                <div class="col-md-6">
                                                   
                                                  
                                                   <center> <button type="button" class="btn btn--round btn--default" onclick="payWithPaystack()">Buy Now</button><center>
                                                </div>
                                            </div>';
                                            }
                                            elseif ($ptype=='paypal') {
                                                echo '<div class="row">
                                                <div class="col-md-6">
                                                   
                                                  
                                                   <center> <div  id="paypal-button"> </div><center>
                                                </div>
                                            </div>';
                                                # code...
                                            }
                                            elseif ($ptype=='yalldev') {
        
                                                echo'<div class="row">
                                                <div class="col-md-6">
                                                   
                                                  
                                                   <center> <button type="button" class="btn btn--round btn--default" >Buy Now</button><center>
                                                </div>
                                            </div>';
                                                # code...
                                            }
                                            else {
                                                echo'';
                                            }
                                            
                                            

                                        ?>
          
                                    
           
            <!--<button>Submit</button>-->
        </form>
        
        
                <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
   <?php ft();?>
    <!--================================
        END FOOTER AREA
    =================================-->
    <!-- payment scripts -->
    <script>
            var paymentForm = document.getElementById('paymentForm');

            paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack() {
    
      var handler = PaystackPop.setup({
    
        key: 'pk_test_25b3d5f8bfb5621c4569175877020aafe6085a0a', // Replace with your public key
    
        email: '<?php echo $email?>',
    
        amount: <?php echo $amount * 100 * 5.7 ;?>, // the amount value is multiplied by 100 to convert to the lowest currency unit
    
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
    
        firstname: '<?php echo $fname?>',
    
        lastname: '<?php echo $lname?>',
    
        ref: '<?php echo $myref ;?>', // Replace with a reference you generated
        metadata: {
            custom_fields : 
                [
                        {
                            display_name: 'Mobile Number',
                            variable_name: 'mobile_number',
                            value:"+233556676471"
                        }
                        
                
                ]
        },
    
        callback: function(response) {
    
          //this happens after the payment is completed successfully
    
          var reference = response.reference;
          var fname  = '<?php echo $fname;?>';
          var lname = '<?php echo $lname;?>';
          var email = '<?php echo $email;?>';
          var amount = '<?php echo $amount;?>';
    
        //   alert('Payment complete! Reference: ' + reference);
        // window.location='success.php?ref='+ reference + '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&amount=' + amount ;
          
          // Make an AJAX call to your server with the reference to verify the transaction
          
            if(response.status == "success"){
                var myrf = '<?php echo $myref ?>';
                var mimi = '<?php echo $_SESSION['id']?>';
            
                var opt = {
                    url : "dollar.php?dollar=adsales",
                    type: "post",
                    data: {rr: myrf, mim: mimi},
                    success: function(rep){
                    setTimeout(function () { 
                        swal({
                        title: "Success!",
                        text: "<small>You purchase is successfull  </small>",
                        type: "success",
                        html: true,
                        confirmButtonText: "OK"
                        },
                        function(isConfirm){
                        if (isConfirm) {
                            window.location = "dashboard-purchase.php";
                        }
                        }); }, 1000);
                    }
                    
                }
                $.ajax(opt);
             
                

                    
               
            }            
        },
    
        onClose: function() {
    
          alert('Transaction was not completed, window closed.');
    
        },
    
      });
    
      handler.openIframe();
    
    }
        </script>


<!-- paypal script -->
<script>

        paypal.Button.render({
            // style: {
                       
            //             color:   'blue',
            //             shape:   'rect',
            //             label:   'paypal'
            //         },

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox: 'AcGEgL-qARRo1ERQAkOOKdszq7yNsMczTqhQkhs4cGMcJHxbjMSFjEN5rdH7dEPoeAcf-0gLxSxyn6N3',
                production: 'Aa_hvcTTV83YHn_q7NA83KnYETQnKes_ktcIfQzV-jPZKolBMSO8osMf-zd1jBETFbcu8h31Ve7dxg5P'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function (data, actions) {
                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {total: <?php echo $total;?>, currency: 'USD'}
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function (data, actions) {
                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function () {
                  window.alert('Payment Complete!');
                });
            }
        }, '#paypal-button');

    </script>
        
              <script src="https://js.paystack.co/v1/inline.js"></script> 

    <!--//////////////////// JS GOES HERE ////////////////-->
    <script src="https://js.paystack.co/v1/inline.js"></script> 

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js -->
    <script src="js/plugins.min.js"></script>
    <script src="js/script.min.js"></script>

    <script>

$(function(){
    $('.mycart').load('mc.php?uid=<?php echo $_SESSION['id'];?>');

    $('#mctotal').load('mt.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter1').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');
    $('.mysum').load('osm.php?uid=<?php echo $_SESSION['id'];?>');
    $('#tt').load('mtc.php?uid=<?php echo $_SESSION['id'];?>');

setInterval(() => {

    $('.mysum').load('osm.php?uid=<?php echo $_SESSION['id'];?>');
    $('#tt').load('mtc.php?uid=<?php echo $_SESSION['id'];?>');

}, 3000);

})







</script>
<script src="sweetalert.min.js"></script>

<script src="dollar.js"></script>

    <!-- endinject -->
</body>

</html>