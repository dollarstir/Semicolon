
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
    <meta name="description" content="YallDev - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev - Dashboard Withdraw</title>
    <!--inject:css-->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.css">

    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload dashboard-withdraw">

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
                                <a href="dashboard-withdrawal.php#">Withdraw</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Withdrawals</h1>
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
                            <li class="active">
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
                        <div class="dashboard_title_area clearfix">
                            <div class="dashboard__title pull-left">
                                <h3>Withdrawals</h3>
                            </div>

                            <div class="pull-right">
                                <a href="add-payment-method.php" class="btn btn--round btn--md">Add Payment Method</a>
                            </div>
                        </div>
                        <!-- end /.dashboard_title_area -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module cardify">

                            <form action="" class="redrawalfrm">
                                <div class="row">
                                        <!-- <form class="redrawfrm"> -->
                                                <div class="col-lg-6">
                                                    <div class="modules__title">
                                                        <h3>Payment Methods</h3>
                                                    </div>

                                                    <div class="modules__content">
                                                        <p class="subtitle">Select your Payment Method for
                                                            <a href="dashboard-withdrawal.php#">Withdraw Earnings</a>
                                                        </p>
                                                        <div class="options">
                                                        
                                                             <?php mymethods($_SESSION['id']);?>

                                                            <!-- <div class="custom-radio">
                                                                <input type="radio" id="opt2" class="" name="filter_opt">
                                                                <label for="opt2">
                                                                    <span class="circle"></span>Paypal</label>
                                                            </div>

                                                            <div class="custom-radio">
                                                                <input type="radio" id="opt3" class="" name="filter_opt">
                                                                <label for="opt3">
                                                                    <span class="circle"></span>Direct to Local Bank (USD) - Account ending in 5790 (Minimum $50)</label>
                                                            </div> -->
                                                        </div>
                                                        <!-- end /.options -->

                                                        
                                                    </div>
                                                    <!-- end /.modules__content -->


                                        <div class="payment_info modules__content" id="mychoice">
                                                        
                                        </div>

                                                                

                                                </div>
                                                <!-- end /.col-md-6 -->

                                                <div class="col-lg-6">
                                                    <div class="modules__title">
                                                        <h3>Withdraw Amount</h3>
                                                    </div>

                                                    <div class="modules__content">
                                                        <p class="subtitle">How much amount would you like to Withdraw?</p>
                                                        <div class="options">
                                                            <div class="custom-radio">
                                                                <input type="radio" id="mybb" class="" name="av">
                                                                <label for="mybb">
                                                                    <span class="circle"></span>Available balance:
                                                                    <span class="bold">$<?php mybalance($_SESSION['id']);?></span>
                                                                    <input type="hidden" id="mist" value="<?php mybalance($_SESSION['id']);?>" class="text_field" placeholder="00.00" name="mybalance">
                                                                    <input type="hidden" id="" value="<?php echo $_SESSION['id'];?>" class="text_field" placeholder="00.00" name="uid">


                                                                </label>
                                                            </div>

                                                            <div class="custom-radio">
                                                                <input type="radio" id="mypart" class="" name="av">
                                                                <label for="mypart">
                                                                    <span class="circle"></span>A partial amount...</label>
                                                            </div>

                                                            <div class="withdraw_amount">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">$</span>
                                                                    <input type="number" id="rlicense" class="text_field" placeholder="00.00" name="amount">
                                                                </div><br><br>

                                                                <div class="alert alert-danger" role="alert" id="bmess">
                                                                    <span class="alert_icon lnr lnr-warning"></span>
                                                                    Insuffient Balance
                                                                    
                                                                </div>
                                                                <span class="fee">$2 USD Fee per withdrawal</span>
                                                            </div>
                                                        </div>

                                                        <div class="button_wrapper">
                                                            <button type="submit" class="btn btn--round btn--md">Submit Withdrawal</button>
                                                            <button type="reset" class="btn btn--round btn-sm cancel_btn">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <!-- end /.col-md-6 -->

                                        
                                    </div>
                          </form>
                            <!-- end /.row -->
                        </div>
                        <!-- end /.withdraw_module -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="withdraw_module withdraw_history">
                            <div class="withdraw_table_header">
                                <h3>Withdrawal History</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table withdraw__table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Payment Method</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php redrawallhistory($_SESSION['id']);?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal">Rating this Item</h3>
                    <h4>Product Enquiry Extension</h4>
                    <p>by
                        <a href="author.php">AazzTech</a>
                    </p>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <form action="#">
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
                                        <select name="review_reason" id="">
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