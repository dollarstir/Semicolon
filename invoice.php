<?php
session_start();

if(!isset($_SESSION['id'])){
    echo '<script> window.location="index.php"</script>';


}
else{
    $mysession = $_SESSION['id'];

    $_SESSION['pid'] =$mysession;
    
    
}


include 'core.php';
$ref = $_GET['ref'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="YallDev - Complete Online Multipurpose YallDev HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>YallDev - Invoice</title>
    <base href="/market/">

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload invoice-page">

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
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html">Statement</a>
                            </li>
                            <li class="active">
                                <a href="invoice.html#">Invoice</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Invoice</h1>
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
                            <li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Invoice</h3>
                                </div>
                            </div>

                            <div class="pull-right">
                                <a href="invoice.html#" class="btn btn--round print_btn">
                                    <span class="lnr lnr-printer"></span>Print</a>
                                <a href="invoice.html#" class="btn btn--round btn--sm">Download</a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                <?php 
                include 'db.php';
                
                $selo = mysqli_query($conn,"SELECT * FROM statement WHERE ref='$ref'");
                $rvo = mysqli_fetch_array($selo);
                $uid = $_SESSION['id'];
                $selt = mysqli_query($conn,"SELECT * FROM users WHERE id='$uid'");
                $ruu = mysqli_fetch_array($selt);
                extract($ruu);

                $selc = mysqli_query($conn,"SELECT * FROM statement WHERE ref='$ref'");
                $tt = 0;
                while ($rvc = mysqli_fetch_array($selc)) {

                $tt = $tt + $rvc['price'];
                # code...
                }                
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="invoice">
                            <div class="invoice__head">
                                <div class="invoice_logo">
                                    <img src="images/logo.png" alt="">
                                </div>

                                <div class="info">
                                    <h4>Invoice info</h4>
                                    <p>Order # <?php echo $ref;?></p>
                                </div>
                            </div>
                            <!-- end /.invoice__head -->

                            <div class="invoice__meta">
                                <div class="address">
                                    <h5 class="bold"><?php echo $ruu['username'] ;?></h5>
                                    <p><?php echo $ruu['address1'] ;?></p>
                                    
                                </div>

                                <div class="date_info">
                                    <p>
                                        <span>Invoice Date</span><?php echo $rvo['dateadded'];?></p>
                                    <p>
                                        <span>Due Date</span><?php echo $rvo['dateadded'];?></p>
                                    <p class="status">
                                        <span>Status</span><?php echo $rvo['type'];?></p>
                                </div>
                            </div>
                            <!-- end /.invoice__meta -->

                            <div class="invoice__detail">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>AazzTech</th>
                                                <th>Item</th>
                                                <th>License</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php invoice($ref);?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="pricing_info">
                                    <p>Sub - Total amount: $<?php echo $tt;?></p>
                                    <p class="bold">Total : $<?php echo $tt;?></p>
                                </div>
                            </div>
                            <!-- end /.invoice_detail -->
                        </div>
                        <!-- end /.invoice -->


                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.row -->
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