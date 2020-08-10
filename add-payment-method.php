
<?php
session_start();

if(!isset($_SESSION['id'])){
    echo '<script> window.location="index.php"</script>';


}
else{
    $mysession = $_SESSION['id'];

    $_SESSION['pid'] =$mysession;
    
    
}


include 'core.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="YallDev - Complete Online Multipurpose YallDev HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev - Add Payment Method</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.css">

    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload add-payment-method">

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
                            <li>
                                <a href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="add-payment-method.php#">Withdrawals</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Add Payment Method</h1>
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
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.php">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.php">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.php">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.php">
                                    <span class="lnr lnr-dice"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.php">
                                    <span class="lnr lnr-chart-bars"></span>Statements</a>
                            </li>
                            <li>
                                <a href="dashboard-upload.php">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.php">
                                    <span class="lnr lnr-briefcase"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.php">
                                    <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                            </li>

                        </ul>
                        <!-- end /.dashboard_menu -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Add Payment Method</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <form action="#" name="add_credit_form" id="adpayfrm">


                    <div class="credit_modules">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modules__title">
                                    <h3>Payment Method & Confirmation</h3>
                                </div>

                                <div class="modules__content">
                                    <!-- <p class="subtitle">How much credit would you like to add?</p> -->

                                    <ul class="payment_method">
                                        <li>
                                            <div class="custom-radio custom_radio--big">
                                                <input type="radio" id="opt1" class="" name="card" value="mastercard" >
                                                <label for="opt1">
                                                    <img src="images/mas.jpg" alt="payment cards">
                                                    <span class="circle"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio custom_radio--big">
                                                <input type="radio" id="opt2" class="" name="card" value="visacard">
                                                <label for="opt2">
                                                    <img src="images/vis.jpg" alt="payment cards">
                                                    <span class="circle"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-radio custom_radio--big">
                                                <input type="radio" id="opt3" class="" name="card" value="paypal">
                                                <label for="opt3">
                                                    <img src="images/ppl.jpg" alt="payment cards">
                                                    <span class="circle"></span>
                                                </label>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="custom-radio custom_radio--big">
                                                <input type="radio" id="opt5" class="" name="card" value="Mobilemoney">
                                                <label for="opt5">
                                                <img src="images/mom-2.png" alt="Visa Cards" style="width:250px;">
                                                    <span class="circle"></span>
                                                </label>
                                            </div>
                                        </li>

                                        
                                    </ul>
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.col-md-12 -->
                        </div>
                        <!-- end /.row -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="payment_info modules__content">
                                    <div class="form-group" id="cnum">
                                        <label for="card_number">Card Number</label>
                                        <input id="card_number" type="text" name="cnum" class="text_field" placeholder="Enter your card number here...">
                                    </div>

                                    <div class="form-group" id="monum">
                                        <label for="card_number">Mobile money Number</label>
                                        <input id="card_number" name="monum" type="text" class="text_field" placeholder="Enter your mobile money number here...">
                                    </div>

                                    <div class="form-group" id="monam">
                                        <label for="card_number">Mobile Money Account Name</label>
                                        <input id="card_number" type="text" name="moname" class="text_field" placeholder="Enter your Account name here...">
                                    </div>

                                    <div class="form-group" id="paymail">
                                        <label for="card_number">Paypal Email/Payment address</label>
                                        <input id="card_number" type="hidden" name="uid" class="text_field" placeholder="Enter your paypal email address here..." value="<?php echo $_SESSION['id'];?>">
                                        
                                        <input id="card_number" type="text" name="paymail" class="text_field" placeholder="Enter your paypal email address here...">
                                    </div>

                                    <!-- lebel for date selection -->
                                    <label for="name" id="expa">Expire Date</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="cmo">
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
                                                </div>
                                                <!-- end /.select-wrap -->
                                            </div>
                                            <!-- end /.form-group -->
                                        </div>
                                        <!-- end /.col-md-6-->

                                        <div class="col-md-6">
                                            <div class="form-group" id="cy">
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
                                                    </select>
                                                    <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                                <!-- end /.select-wrap -->
                                            </div>
                                            <!-- end /.form-group -->
                                        </div>
                                        <!-- end /.col-md-6-->
                                    </div>
                                    <!-- end /.row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="cvc">
                                                <label for="cv_code">CVV Code</label>
                                                <input id="cv_code" type="text" name="cvc" class="text_field" placeholder="Enter code here...">
                                            </div>

                                            <!-- <div class="custom-radio">
                                                <input type="radio" id="opt8" class="" name="filter_opt">
                                                <label for="opt8">
                                                    <span class="circle"></span>Save card for next time</label>
                                            </div> -->

                                            <button type="submit" class="btn btn--round btn--default">Add  Now</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.payment_info -->
                            </div>
                            <!-- end /.col-md-6 -->
                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.credit_modules -->
                </form>
                <!-- end /.add_credit_form -->
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

    <!--//////////////////// JS GOES HERE ////////////////-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js -->
    <script src="js/plugins.min.js"></script>
    <script src="js/script.min.js"></script>

    <script>

$(function(){
    $('.mycart').load('mc.php?uid=<?php echo $_SESSION['id'];?>');

    $('#mctotal').load('mt.php?uid=<?php echo $_SESSION['id'];?>');
    // $('#ccounter').load('mt.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter1').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');

    function fetchdata(){
                $.ajax({
                url: 'notification.php?uid=<?php echo $_SESSION['id'];?>',
                type: 'post',
                success: function(response){
                
                $('.pusher').html(response);

                // $('$rp').fadeOut(5000);
                }
                });
            }

            function notif(){
                $.ajax({
                url: 'countnot.php?uid=<?php echo $_SESSION['id'];?>',
                type: 'post',
                success: function(response){
                
                $('#mnoc').html(response);

               
                }
                });
            }
            notif();
            fetchdata()

            setInterval(() => {
                fetchdata();
                notif();
                
            }, 10000);

})
   

    


</script>
     <script src="sweetalert.min.js"></script>

    <script src="dollar.js"></script>
    <!-- endinject -->
</body>

</html>