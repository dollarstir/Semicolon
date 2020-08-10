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


    <title>Martplace - Dashboard setting</title>

    <!-- sweetalert -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


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
                                
                                if(empty($pimage)){
                                    echo'<div class="alert alert-warning" role="alert">
                                    <span class="alert_icon lnr lnr-warning"></span>
                                    <strong>Warning!</strong> Please upload profile picture
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button> -->
                                </div>';
                                }
                                elseif(empty($cimage)){
                                    echo'<div class="alert alert-warning" role="alert">
                                    <span class="alert_icon lnr lnr-warning"></span>
                                    <strong>Warning!</strong> Please upload Cover picture
                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                    </button> -->
                                </div>';

                                }
                                else {
                                    
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

                <form id="picture" class="setting_form">
                <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                    <div class="row">
                        
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-10">
                            <div class="information_module">
                                <a class="toggle_title" href="dashboard-setting.html#collapse2" role="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse1">
                                    <h4>Profile Image & Cover
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set profile_images toggle_module show" id="collapse2">
                                    <div class="information_wrapper">
                                        <div class="profile_image_area">
                                            <?php 
                                                 if(empty($pimage)){
                                                     echo '<img src="images/'.$gender.'.png" alt="Author profile area" style="width:100px;height:100px;" id="pm">';
                                                 }

                                                 else{
                                                    echo'<img src="profile/'.$pimage.'" alt="Author profile area" style="width:100px;height:100px;" id="pm">';
                                                 }
                                            ?>
                                            <div class="img_info">
                                                <p class="bold">Profile Image</p>
                                                <!-- <p class="subtitle">JPG, GIF or PNG 100x100 px</p> -->
                                            </div>

                                            <label for="cover_photo" class="upload_btn">
                                                <input type="file" id="cover_photo" name="image" onchange="readURL();">
                                                <input type="hidden" id="" name="id" value="<?php echo $id;?>">
                                                <input type="hidden" id="" name="pimage" value="<?php echo $pimage;?>">
                                                <input type="hidden" id="" name="cimage" value="<?php echo $cimage;?>">



                                                <span class="btn btn--sm btn--round" aria-hidden="true">Upload Image</span>
                                            </label>
                                        </div>

                                        <div class="prof_img_upload">
                                            <p class="bold">Cover Image</p>
                                            <?php 
                                                 if(empty($cimage)){
                                                     echo '<img src="images/cvrplc.jpg" alt="Author profile area" style="height:350px;" id="cm">';
                                                 }

                                                 else{
                                                    echo'<img src="cover/'.$cimage.'" alt="Author Cover area" style="height:350px;" id="cm">';
                                                 }
                                            ?>
                                            

                                            <div class="upload_title">
                                                <!-- <p>JPG, GIF or PNG 750x370 px</p> -->
                                                <label for="dp" class="upload_btn">
                                                    <input type="file" id="dp" name="image1" onchange="readscreenshot();" >
                                                    <span class="btn btn--sm btn--round" aria-hidden="true">Upload Image</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.information_module -->

                            
                            <!-- end /.information_module -->

                           
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
   <?php ft();?>
    <!--================================
        END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->


    <!-- display profile picture -->

    <script>

function readURL() {
            var mp = document.getElementById('cover_photo');
            if (mp.files && mp.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pm')
                        .attr('src', e.target.result)
                        
                };

                reader.readAsDataURL(mp.files[0]);
            }
    }



    function readscreenshot() {
            var mp = document.getElementById('dp');
            if (mp.files && mp.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#cm')
                        .attr('src', e.target.result)
                        
                };

                reader.readAsDataURL(mp.files[0]);
            }
    }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0C5etf1GVmL_ldVAichWwFFVcDfa1y_c"></script>
    <!-- inject:js -->
    <script src="js/plugins.min.js"></script>
    <script src="js/script.min.js"></script>
    <!-- endinject -->

    <!-- dollarsoft JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>

$(function(){
    $('.mycart').load('mc.php?uid=<?php echo $_SESSION['id'];?>');

    $('#mctotal').load('mt.php?uid=<?php echo $_SESSION['id'];?>');
    // $('#ccounter').load('mt.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');
    $('#ccounter1').load('cartc.php?uid=<?php echo $_SESSION['id'];?>');


})
   

    


</script>
    <script src="dollar.js"></script>
</body>

</html>