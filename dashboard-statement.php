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


    <title>YallDev - Dashboard Statement</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="sweetalert.css">

    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload dashboard-statement">

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
                                <a href="dashboard-statement.php#">Statement</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Sales Statements</h1>
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
                            <li class="active">
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
        <!-- end /.dashboard_menu_area :) -->

        <div class="dashboard_contents dashboard_statement_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Sales Statements</h3>
                                <div class="date_area">
                                    <form action="#">
                                        <div class="input_with_icon">
                                            <input type="text" class="dattaPikkara" placeholder="From">
                                            <span class="lnr lnr-calendar-full"></span>
                                        </div>

                                        <div class="input_with_icon">
                                            <input type="text" class="dattaPikkara" placeholder="To">
                                            <span class="lnr lnr-calendar-full"></span>
                                        </div>
                                        <div class="select-wrap">
                                            <select name="transaction_type" id="#">
                                                <option value="all">All Transaction</option>
                                                <option value="sale">Sale</option>
                                                <option value="sale">Purchase</option>
                                                <option value="credited">Withdraw</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>

                                        <button type="submit" class="btn btn--sm btn--round btn--color1">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->


                <?php

                    include 'db.php';
                    $s1= mysqli_query($conn,"SELECT * FROM sales WHERE uid='".$_SESSION['id']."' ");
                        $pp= 0;
                        while ($pu = mysqli_fetch_array($s1)) {


                            $pp = $pp + $pu['price'];
                            # code...
                        }
                    ?>

                <?php

                include 'db.php';
                $s2= mysqli_query($conn,"SELECT * FROM sales WHERE devid='".$_SESSION['id']."' ");
                    $st= 0;
                    while ($sa = mysqli_fetch_array($s2)) {


                        $st = $st + $sa['price'];
                        # code...
                    }
                ?>

                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-tag icon mcolorbg1"></span>
                                <div class="info">
                                    <p>$<?php echo $st;?></p>
                                    <span>Total Sales</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-cart icon mcolorbg2"></span>
                                <div class="info">
                                    <p>$<?php echo $pp;?></p>
                                    <span>Total Purchases</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-dice icon mcolorbg3"></span>
                                <div class="info">
                                    <p>$680</p>
                                    <span>Total Credited</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-3 col-md-3">
                        <div class="statement_info_card">
                            <div class="info_wrap">
                                <span class="lnr lnr-briefcase icon mcolorbg4"></span>
                                <div class="info">
                                    <p>$3,690</p>
                                    <span>Total Withdraw</span>
                                </div>
                            </div>
                            <!-- end /.info_wrap -->
                        </div>
                        <!-- end /.statement_info_card -->
                    </div>
                    <!-- end /.col-md-3 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="statement_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Order ID</th>
                                        <th>Author</th>
                                        <th>Detail</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Earning</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                <?php statement($_SESSION['id']);?>

                                    <!-- <tr>
                                        <td>03 Jul 2017</td>
                                        <td>MP810094</td>
                                        <td class="author">Markober</td>
                                        <td class="detail">
                                            <a href="single-product.php">Martplace Coffee Shop</a>
                                        </td>
                                        <td class="type">
                                            <span class="purchase">Purchase</span>
                                        </td>
                                        <td>$30</td>
                                        <td class="earning subtract">-$30</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>09 Jul 2017</td>
                                        <td>MP810094</td>
                                        <td class="author">Themexylum</td>
                                        <td class="detail">
                                            <a href="single-product.php">MartPlace Extension Bundle</a>
                                        </td>
                                        <td class="type">
                                            <span class="sale">Sale</span>
                                        </td>
                                        <td>$49</td>
                                        <td class="earning">$24.50</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>05 Apr 2017</td>
                                        <td>MP810094</td>
                                        <td class="author">AazzTech</td>
                                        <td class="detail">
                                            <a href="single-product.php">Stack - Responsive Bootstrap 4 Admin Template</a>
                                        </td>
                                        <td class="type">
                                            <span class="sale">Sale</span>
                                        </td>
                                        <td>$20</td>
                                        <td class="earning">$10</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>25 Dec 2016</td>
                                        <td>MP810394</td>
                                        <td class="author text-center" colspan="2">Via Payoneer</td>
                                        <td class="type">
                                            <span class="credited">Credited</span>
                                        </td>
                                        <td>$49</td>
                                        <td class="earning">$24.50</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>09 Jul 2017</td>
                                        <td>MP810094</td>
                                        <td class="author text-center" colspan="2">Via Paypal</td>
                                        <td class="type">
                                            <span class="withdrawal">Withdraw</span>
                                        </td>
                                        <td>$350</td>
                                        <td class="earning subtract">-$350</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>0 Feb 2017</td>
                                        <td>MP810094</td>
                                        <td class="author">Artcorner</td>
                                        <td class="detail">
                                            <a href="single-product.php">Rida - Applanding Onepage </a>
                                        </td>
                                        <td class="type">
                                            <span class="purchase">Purchase</span>
                                        </td>
                                        <td>$30</td>
                                        <td class="earning subtract">-$30</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>26 May 2016</td>
                                        <td>MP81024</td>
                                        <td class="author">Awesomaiya</td>
                                        <td class="detail">
                                            <a href="single-product.php">Table Generator extension bundle</a>
                                        </td>
                                        <td class="type">
                                            <span class="sale">Sale</span>
                                        </td>
                                        <td>$49</td>
                                        <td class="earning">$24.50</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>26 Aug 2017</td>
                                        <td>MP810654</td>
                                        <td class="author">Codepoets</td>
                                        <td class="detail">
                                            <a href="single-product.php">Kamla One page portfolio</a>
                                        </td>
                                        <td class="type">
                                            <span class="sale">Sale</span>
                                        </td>
                                        <td>$49</td>
                                        <td class="earning">$24.50</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>09 Jul 2017</td>
                                        <td>MP810094</td>
                                        <td class="author">Designing</td>
                                        <td class="detail">
                                            <a href="single-product.php">Ajaxified karma loader</a>
                                        </td>
                                        <td class="type">
                                            <span class="purchase">Purchased</span>
                                        </td>
                                        <td>$29</td>
                                        <td class="earning">-$29</td>
                                        <td class="action">
                                            <a href="invoice.php">view</a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>

                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">
                                    <div class="nav-links">
                                        <a class="prev page-numbers" href="dashboard-statement.php#">
                                            <span class="lnr lnr-arrow-left"></span>
                                        </a>
                                        <a class="page-numbers current" href="dashboard-statement.php#">1</a>
                                        <a class="page-numbers" href="dashboard-statement.php#">2</a>
                                        <a class="page-numbers" href="dashboard-statement.php#">3</a>
                                        <a class="next page-numbers" href="dashboard-statement.php#">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
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
                
                $('.pusher').php(response);

                // $('$rp').fadeOut(5000);
                }
                });
            }

            function notif(){
                $.ajax({
                url: 'countnot.php?uid=<?php echo $_SESSION['id'];?>',
                type: 'post',
                success: function(response){
                
                $('#mnoc').php(response);

               
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