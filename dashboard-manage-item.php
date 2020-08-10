
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


    <title>YallDev - Manage Item</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico">
</head>

<body class="preload dashboard-edit">

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

    <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

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
                                <a href="dashboard-manage-item.html#">Manage Item</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Manage Item</h1>
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
                            <li class="active">
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
                        <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                            <div class="dashboard__title dashboard__title pull-left">
                                <h3>Manage Items</h3>
                            </div>

                            <div class="pull-right">
                                <div class="filter__option filter--text">
                                    <p>
                                        <span>26</span> Products</p>
                                </div>

                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="low">Price : Low to High</option>
                                            <option value="high">Price : High to low</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.pull-right -->
                        </div>
                        <!-- end /.filter-bar -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <!-- start .col-md-4 -->
                    <?php
                        include 'db.php';
                        $getprod= mysqli_query($conn,"SELECT * FROM products WHERE uid='".$_SESSION['id']."'   ORDER BY id DESC");
                        $getuser= mysqli_query($conn,"SELECT * FROM users where id='".$_SESSION['id']."'");
                                        $ru= mysqli_fetch_array($getuser);
                                        extract($ru);

                                        
                        

                       while ($row= mysqli_fetch_array($getprod)) {
                            $itemid = $row['id'];

                        $csa = mysqli_query($conn,"SELECT * FROM sales WHERE prodid ='$itemid'");
                                         $rca = mysqli_num_rows($csa);

                                echo'<div class="col-lg-4 col-md-6">
                                <!-- start .single-product -->
                                <div class="product product--card">

                                    <div class="product__thumbnail">
                                        <img src="thumbnails/'.$row['thumbnail'].'" alt="Product Image">

                                        <div class="prod_option">
                                            <a href="dashboard-manage-item.html#" id="drop2" class="dropdown-trigger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="lnr lnr-cog setting-icon"></span>
                                            </a>

                                            <div class="options dropdown-menu" aria-labelledby="drop2">
                                                <ul>
                                                    <li>
                                                        <a href="edit-item.php?id='.$row['id'].'">
                                                            <span class="lnr lnr-pencil"></span>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-manage-item.html#">
                                                            <span class="lnr lnr-eye"></span>Hide</a>
                                                    </li>
                                                    <li>
                                                        <a href="dashboard-manage-item.html#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                            <span class="lnr lnr-trash"></span>Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.product__thumbnail -->

                                    <div class="product-desc">
                                        <a href="product/'.$row['id'].'" class="product_title">
                                            <h4>'.$row['item'].'</h4>
                                        </a>
                                        <ul class="titlebtm">
                                            <li>
                                               ';
                                               if(empty($pimage)){
                                                echo '<img class="auth-img" src="profile/'.$gender.'.png" alt="author image">
                                                <p>
                                                    <a href="dashboard-manage-item.html#">'.$username.'</a>
                                                </p>';
                                            }echo '
                                                
                                            </li>
                                            <li class="product_cat">
                                                <a href="dashboard-manage-item.html#">
                                                    <span class="lnr lnr-book"></span>'.$row['category'].'</a>
                                            </li>
                                        </ul>

                                        <p>';
                                        $txt = $row['description'];
                                // $txt = strip_tags($txt);
                                if (strlen($txt) > 160) {

                                    // truncate string
                                    $stringCut = substr($txt, 0, 160);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $txt = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $txt = $txt.'..';
                                    
                                }

                                echo $txt.'
                                        </p>
                                    </div>
                                    <!-- end /.product-desc -->

                                    <div class="product-purchase">
                                        <div class="price_love">
                                            <span>$'.$row['price'].'</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 90</p>
                                        </div>
                                        <div class="sell">
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <span>'.$rca.'</span>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                            </div>';
                           # code...
                       }


                    
                    ?>





                    
                    <!-- end /.col-md-4 -->

                    
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-area">
                            <nav class="navigation pagination" role="navigation">
                                <div class="nav-links">
                                    <a class="prev page-numbers" href="dashboard-manage-item.html#">
                                        <span class="lnr lnr-arrow-left"></span>
                                    </a>
                                    <a class="page-numbers current" href="dashboard-manage-item.html#">1</a>
                                    <a class="page-numbers" href="dashboard-manage-item.html#">2</a>
                                    <a class="page-numbers" href="dashboard-manage-item.html#">3</a>
                                    <a class="next page-numbers" href="dashboard-manage-item.html#">
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

    <!-- Modal 2 -->
    <div class="modal fade rating_modal item_remove_modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Are you sure to delete this item?</h3>
                    <p>You will not be able to recover this file!</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <button type="submit" class="btn btn--round btn-danger btn--default">Delete</button>
                    <button class="btn btn--round modal_close" data-dismiss="modal">Cancel</button>
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

<script src="dollar.js"></script>
    <!-- endinject -->
</body>

</html>