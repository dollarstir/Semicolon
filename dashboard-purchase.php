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
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev - Dashboard Purchasing</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.css">

    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload dashboard-purchase">

    <!--================================
        START MENU AREA
    =================================-->
    <!-- start menu-area -->
    <?php  topbar()?>
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
                                <a href="dashboard-purchase.html#">Settings</a>
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
    <section class="dashboard-area dashboard_purchase">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.html">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.html">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li>
                            <li class="active">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar clearfix filter-bar2">

                            <div class="dashboard__title pull-left">
                                <h3>Your Purchases</h3>
                            </div>

                            <div class="pull-right">
                                <div class="filter__option filter--text">
                                    <p>
                                        <span><?php userpurchased($_SESSION['id']);?></span> Products Purchased</p>
                                </div>

                                <!-- <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="low">Price : Low to High</option>
                                            <option value="high">Price : High to low</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="12">12 Items per page</option>
                                            <option value="15">15 Items per page</option>
                                            <option value="25">25 Items per page</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div> -->
                            </div>
                            <!-- end /.pull-right -->
                        </div>
                        <!-- end /.filter-bar -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="product_archive">
                    <div class="title_area">
                        <div class="row">
                            <div class="col-md-5">
                                <h4>Product Details</h4>
                            </div>
                            <div class="col-md-3">
                                <h4 class="add_info">Additional Info</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Download</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                       <?php purchaseditem($_SESSION['id']);?>

                        

                        <div class="col-md-12">
                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">
                                    <div class="nav-links">
                                        <a class="prev page-numbers" href="dashboard-purchase.html#">
                                            <span class="lnr lnr-arrow-left"></span>
                                        </a>
                                        <a class="page-numbers current" href="dashboard-purchase.html#">1</a>
                                        <a class="page-numbers" href="dashboard-purchase.html#">2</a>
                                        <a class="page-numbers" href="dashboard-purchase.html#">3</a>
                                        <a class="next page-numbers" href="dashboard-purchase.html#">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <!-- end /.pagination-area -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.product_archive2 -->
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

    <!-- Modals -->
    <div class="modal fade rating_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal">Rating this Item</h3>
                    <h4>Product Enquiry Extension</h4>
                    <p>by
                        <a href="author.html">AazzTech</a>
                    </p>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <form action="#">
                    <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                        <ul>
                            <li>
                                <p>Your Rating</p>
                                <div class="right_content btn btn--round btn--white btn--md">
                                    <select name="rating" class="give_rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </li>

                            <li>
                                <p>Rating Causes</p>
                                <div class="right_content">
                                    <div class="select-wrap">
                                        <select name="review_reason">
                                            <option value="design">Design Quality</option>
                                            <option value="customization">Customization</option>
                                            <option value="support">Support</option>
                                            <option value="performance">Performance</option>
                                            <option value="documentation">Well Documented</option>
                                        </select>

                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="rating_field">
                            <label for="rating_field">Comments</label>
                            <textarea name="rating_field" id="rating_field" class="text_field" placeholder="Please enter your rating reason to help the author"></textarea>
                            <p class="notice">Your review will be ​publicly visible​ and the author may reply to your comments. </p>
                        </div>
                        <button type="submit" class="btn btn--round btn--default">Submit Rating</button>
                        <button class="btn btn--round modal_close" data-dismiss="modal">Close</button>
                    </form>
                    <!-- end /.form -->
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>

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