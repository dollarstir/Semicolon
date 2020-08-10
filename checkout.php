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


include 'core.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev - Dashboard Checkout</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->
    <script type= "text/javascript" src = "countries.js"></script>
    <!-- sweetalert -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
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
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="checkout.html#">Checkout</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Checkout</h1>
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
                <form action="confirm.php" class="setting_form" method="POST">
                <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Biling Information </h4>
                                </div>

                                <div class="information__set">
                                    <div class="information_wrapper form--fields">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="first_name" class="text_field" placeholder="First Name" value="Ron">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">last Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="last_name" class="text_field" placeholder="last name" value="Doe">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.row -->

                                        <div class="form-group">
                                            <label for="email">Company Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email" class="text_field" placeholder="AazzTech" value="AazzTech">
                                        </div>

                                        <div class="form-group">
                                            <label for="email1">Email Adress
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email1" class="text_field" placeholder="Email address" value="contact@aazztech.com">
                                        </div>

                                        <div class="form-group">
                                            <label for="country1">Country
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country" id="country" class="text_field">
                                                    
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="address1">Address Line 1</label>
                                            <input type="text" id="address1" class="text_field" placeholder="Address line one">
                                        </div>

                                        <div class="form-group">
                                            <label for="address2">Address Line 2</label>
                                            <input type="text" id="address2" class="text_field" placeholder="Address line two">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City / State
                                                        <sup>*</sup>
                                                    </label>
                                                    <div class="select-wrap select-wrap2">
                                                        <select name="state" id="state" class="text_field">
                                                            <!-- <option value="">Select one</option>
                                                            <option value="dhaka">Dhaka</option>
                                                            <option value="sydney">Sydney</option>
                                                            <option value="newyork">New York</option>
                                                            <option value="london">London</option>
                                                            <option value="mexico">New Mexico</option> -->
                                                        </select>
                                                        <span class="lnr lnr-chevron-down"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <script language="javascript">
                                                populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
                                                populateCountries("country2");
                                                populateCountries("country2");
                                            </script>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="zipcode">Zip / Postal Code
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="zipcode" class="text_field" placeholder="zip/postal code">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">
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
                                    <h4>Select Payment Method</h4>
                                </div>

                                <ul>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt" value="momo">
                                            <label for="opt1">
                                                <span class="circle"></span>Mobile Money/ Card</label>
                                        </div>
                                        <img src="images/momo.png" alt="Visa Cards" style="width:250px;">
                                    </li>


                                    <!-- <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt">
                                            <label for="opt1">
                                                <span class="circle"></span>Credit Card</label>
                                        </div>
                                        <img src="images/cards.png" alt="Visa Cards">
                                    </li> -->

                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt" value="paypal">
                                            <label for="opt2">
                                                <span class="circle"></span>Paypal</label>
                                        </div>
                                        <img src="images/paypal.png" alt="Visa Cards">
                                    </li>

                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt" value="yalldev">
                                            <label for="opt3">
                                                <span class="circle"></span>YallDev Wallet</label>
                                        </div>
                                        <p>Balance
                                            <span class="bold">$180</span>
                                        </p>
                                    </li>
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

                                        <div class="col-md-6 col-sm-6">
                                            <!-- <div class="form-group">
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
                                                </div> -->
                                                <!-- end /.select-wrap -->
                                            <!-- </div> -->
                                            <!-- end /.form-group -->
                                        <!-- </div> -->
                                        <!-- end /.col-md-6-->
                                    <!-- </div> -->
                                    <!-- end /.row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <div class="form-group">
                                                <label for="cv_code">CVV Code</label>
                                                <input id="cv_code" type="text" class="text_field" placeholder="Enter code here...">
                                            </div> -->

                                            <input type="submit" class="btn btn--round btn--default" value="Confirm Order">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.information_module-->
                        </div>
                        <!-- end /.col-md-6 -->
                    </div>
                    <!-- end /.row -->
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

    <!--//////////////////// JS GOES HERE ////////////////-->
   
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
    <script src="dollar.js"></script>
    <!-- endinject -->
</body>

</html>