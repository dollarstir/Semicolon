<?php
session_start();

if(!isset($_SESSION['id'])){

    echo '<script> window.location="login.php"</script>';

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


    <title>YallDev - Dashboard setting</title>

    <!-- sweetalert -->
 <link rel="stylesheet" type="text/css" href="sweetalert.css">


    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.aazztech.com/theme/html/martplace/dist/images/favicon.png">
</head>

<body class="preload dashboard-setting">

    <!--================================
        START MENU AREA
    =================================-->
    <!-- start menu-area -->
    <?php  topbar();?>
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
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-setting.html#">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Author's Settings</h1>
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
                                <a href="dashboard.html">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-setting.html">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.html">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.html">
                                    <span class="lnr lnr-dice"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html">
                                    <span class="lnr lnr-chart-bars"></span>Statements</a>
                            </li>
                            <li>
                                <a href="dashboard-upload.html">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.html">
                                    <span class="lnr lnr-briefcase"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.html">
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
                            <?php
                                include 'db.php';

                                $getdetails = mysqli_query($conn,"SELECT * FROM users WHERE id = '".$_SESSION['id']."' ");
                                $row = mysqli_fetch_array($getdetails);
                                extract($row);
                                
                                if(empty($ph) || empty($bio) || empty($company) || empty($country) || empty($bfn) || empty($bln) || empty($billmail) || empty($address1) || empty($city) || empty($zip)){
                                    echo'<div class="alert alert-warning" role="alert">
                                    <span class="alert_icon lnr lnr-warning"></span>
                                    <strong>Warning!</strong> Please complete your profile
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button> -->
                                </div>';
                                }
                                else{

                                }

                            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Account Settings</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <form id="setting" class="setting_form">
                <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="information_module">
                                <a class="toggle_title" href="dashboard-setting.html#collapse2" role="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Personal Information
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="information_wrapper form--fields">
                                        <div class="form-group">
                                            <label for="acname">Account Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="acname" class="text_field" placeholder="First Name" value="<?php echo $name;?>" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label for="usrname">Username
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="usrname" class="text_field" placeholder="Account name" value="<?php echo $username;?>" name="username">
                                            <p>Your MartPlace URL: https://yalldev.com/<?php echo  $username;?>
                                                <!-- <span>aazztech</span> -->
                                            </p>
                                        </div>

                                        <div class="form-group">
                                            <label for="emailad">Email Address
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="emailad" class="text_field" placeholder="Email address" value="<?php echo  $email;?>" name="email">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password(leave it blank to maintian current password)
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password" id="password" class="text_field" placeholder="enter new password or maintain current password" name="password" value="">
                                                    <input type="hidden" id="password" class="text_field" placeholder="enter new password or maintain current password" name="currentpass" value="<?php echo $password;?>">

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conpassword">Confirm Password
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="password" id="conpassword" class="text_field" placeholder="re-enter password" value="" name="cpass">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" class="text_field" placeholder="Website" value="<?php echo  $website;?>" name="website">
                                        </div>

                                        <div class="form-group">
                                            <label for="country">Country (current: <?php echo  $country;?>)
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="country" id="country" class="text_field" >
                                                   
                                               
                                                    
                                                    
                                                    
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="prohead">Profile Heading</label>
                                            <input type="text" id="prohead" class="text_field" placeholder="Ex: Webdesign & Development Service" value="<?php echo $ph;?>" name="ph">
                                        </div>

                                        <div class="form-group">
                                            <label for="authbio">Author Bio</label>
                                            <textarea name="bio" id="authbio" class="text_field" placeholder="Short brief about yourself or your account..."><?php echo $bio;?></textarea>
                                        </div>
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->

                            <div class="information_module">
                                <a class="toggle_title" href="dashboard-setting.html#collapse1" role="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Biling Information
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse" id="collapse1">
                                    <div class="information_wrapper form--fields">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="first_name" class="text_field" placeholder="First Name" value="<?php echo $bfn;?>" name="bfn">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="last_name">last Name
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="last_name" class="text_field" placeholder="last name" value="<?php echo $bln;?>" name="bln">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.row -->

                                        <div class="form-group">
                                            <label for="email">Company Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email" class="text_field" placeholder="eg: Dollarsoft" value="<?php echo $company;?>" name="company">
                                        </div>

                                        <div class="form-group">
                                            <label for="email1">Email Adress
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email1" class="text_field" placeholder="Email address" value="<?php echo $billmail;?>" name="billmail">
                                        </div>

                                        <div class="form-group">
                                            <label for="country1">Country (current : <?php echo $billcountry;?>)
                                                <sup>*</sup>
                                            </label>
                                            <div class="select-wrap select-wrap2">
                                                <select  id="country1" class="text_field" name="billcountry">
                                               
                                                    
                                                   
                                                    
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="address1">Address Line 1</label>
                                            <input type="text" id="address1" class="text_field" placeholder="Address line one" value="<?php echo $address1;?>" name="address1">
                                        </div>

                                        <div class="form-group">
                                            <label for="address2">Address Line 2</label>
                                            <input type="text" id="address2" class="text_field" placeholder="Address line two" value="<?php echo $address2;?>" name="address2">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City / State (current: <?php echo $city;?> )
                                                        <sup>*</sup>
                                                    </label>
                                                    <div class="select-wrap select-wrap2">
                                                        <select name="city" id="state" class="text_field">
                                                       
                                                            
                                                        </select>
                                                        <span class="lnr lnr-chevron-down"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="zipcode">Zip / Postal Code
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="text" id="zipcode" class="text_field" placeholder="zip/postal code" value="<?php echo $zip;?>" name="zip">
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
                           
                            <!-- end /.information_module -->

                            <div class="information_module">
                                <a class="toggle_title" href="dashboard-setting.html#collapse5" role="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Social Profiles
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set social_profile toggle_module collapse " id="collapse5">
                                    <div class="information_wrapper">
                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-facebook"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.facebook.com/aazztech" value="<?php echo $facebook;?>" name="facebook">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-twitter"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.twitter.com/aazztech" value="<?php echo $twitter;?>" name="twitter">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-google-plus"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.google.com/aazztech" value="<?php echo $google;?>" name="google">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-behance"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.behance.com/aazztech" value="<?php echo $behance;?>" name="behance">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->

                                        <div class="social__single">
                                            <div class="social_icon">
                                                <span class="fa fa-dribbble"></span>
                                            </div>

                                            <div class="link_field">
                                                <input type="text" class="text_field" placeholder="ex: www.dribbble.com/aazztech" value="<?php echo $dribble;?>" name="dribble">
                                            </div>
                                        </div>
                                        <!-- end /.social__single -->
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.social_profile -->
                            </div>
                            <!-- end /.information_module -->

                            <div class="information_module">
                                <a class="toggle_title" href="dashboard-setting.html#collapse4" role="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse1">
                                    <h4>Email Settings
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set mail_setting toggle_module collapse" id="collapse4">
                                    <div class="information_wrapper">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt1" class="" name="mail_rating_reminder" checked>
                                            <label for="opt1">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Rating Reminders</span>
                                                <span class="desc">Send an email reminding me to rate an item after purchase</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom-radio -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt2" class="" name="mail_update_noti" checked>
                                            <label for="opt2">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Item Update Notifications</span>
                                                <span class="desc">Send an email when an item I've purchased is updated</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt3" class="" name="mail_comment_noti" checked>
                                            <label for="opt3">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Item Comment Notifications</span>
                                                <span class="desc">Send me an email when someone comments on one of my items</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt4" class="" name="mail_item_review_noti" checked>
                                            <label for="opt4">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Item Review Notifications</span>
                                                <span class="desc">Send me an email when my items are approved or rejected</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt5" class="" name="mail_review_noti" checked>
                                            <label for="opt5">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Buyer Review Notifications</span>
                                                <span class="desc">Send me an email when someone leaves a review with their rating</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt6" class="" name="mail_support_noti" checked>
                                            <label for="opt6">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Support Notifications</span>
                                                <span class="desc">Send me emails showing my soon to expire support entitlements</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt7" class="" name="mail_weekly">
                                            <label for="opt7">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">Weekly Summary Emails</span>
                                                <span class="desc">Send me emails showing my soon to expire support entitlements</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->

                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="opt8" class="" name="mail_newsletter">
                                            <label for="opt8">
                                                <span class="shadow_checkbox"></span>
                                                <span class="radio_title">MartPlace Newsletter</span>
                                                <span class="desc">Get update about latest news, update and more.</span>
                                            </label>
                                        </div>
                                        <!-- end /.custom_checkbox -->
                                    </div>
                                    <!-- end /.information_wrapper -->
                                </div>
                                <!-- end /.information_module -->
                            </div>
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-md-12">
                            <div class="dashboard_setting_btn">
                                <button type="submit" class="btn btn--round btn--md">Save Change</button>
                            </div>
                        </div>
                        <!-- end /.col-md-12 -->
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
    <footer class="footer-area">
        <div class="footer-big section--padding">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-footer">
                            <div class="info__logo">
                                <img src="images/flogo.png" alt="footer logo">
                            </div>
                            <p class="info--text">Nunc placerat mi id nisi interdum they mollis. Praesent pharetra, justo ut scel erisque the mattis,
                                leo quam.</p>
                            <ul class="info-contact">
                                <li>
                                    <span class="lnr lnr-phone info-icon"></span>
                                    <span class="info">Phone: +6789-875-2235</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-envelope info-icon"></span>
                                    <span class="info">support@aazztech.com</span>
                                </li>
                                <li>
                                    <span class="lnr lnr-map-marker info-icon"></span>
                                    <span class="info">202 New Hampshire Avenue Northwest #100, New York-2573</span>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.info-footer -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Our Company</h4>
                            <ul>
                                <li>
                                    <a href="dashboard-setting.html#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">How It Work</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Affiliates</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->

                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                            <ul>
                                <li>
                                    <a href="dashboard-setting.html#">How to Join Us</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">How It Work</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Buying and Selling</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Testimonials</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Copyright Notice</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="dashboard-setting.html#">Affiliates</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- end /.col-md-5 -->

                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter">
                            <h4 class="footer-widget-title text--white">Newsletter</h4>
                            <p>Subscribe to get the latest news, update and offer information. Don't worry, we won't send spam!</p>
                            <div class="newsletter__form">
                                <form action="#">
                                    <div class="field-wrapper">
                                        <input class="relative-field rounded" type="text" placeholder="Enter email">
                                        <button class="btn btn--round" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <!-- start .social -->
                            <div class="social social--color--filled">
                                <ul>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-pinterest"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html#">
                                            <span class="fa fa-dribbble"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.social -->
                        </div>
                        <!-- end /.newsletter -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>&copy; 2018
                                <a href="dashboard-setting.html#">MartPlace</a>. All rights reserved. Created by
                                <a href="dashboard-setting.html#">AazzTech</a>
                            </p>
                        </div>

                        <div class="go_top">
                            <span class="lnr lnr-chevron-up"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--================================
        END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js -->
    <script src="js/plugins.min.js"></script>
    <script src="js/script.min.js"></script>
    <!-- endinject -->

    <!-- dollarsoft JS -->
    
    <script type= "text/javascript" src = "countries.js"></script>

    <script language="javascript">
	populateCountries("country"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country1","state");
	// populateCountries("country2");
</script>
    <script src="sweetalert.min.js"></script>

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
    <script src="dollar.js"></script>
</body>

</html>