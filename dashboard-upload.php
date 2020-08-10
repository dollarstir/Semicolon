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


    <title>Martplace - Upload Item</title>
    <!-- sweetalert -->
    <link rel="stylesheet" type="text/css" href="sweetalert.css">

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.aazztech.com/theme/html/martplace/dist/images/favicon.png">
</head>

<body class="preload dashboard-upload">

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
                            <li class="active">
                                <a href="dashboard-upload.html#">Upload Item</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Upload Item</h1>
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
                            <li class="active">
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
                                    <h3>Upload Your Item</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form id="prodfrm">
                        <input type="hidden" id="myid" name="uid" value="<?php echo $_SESSION['id'] ;?>">

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Item Name & Description</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="category" id="category" class="text_field">
                                                <option value="">Select one</option>
                                                <option value="wordpress">Wordpress</option>
                                                <option value="html">Html</option>
                                                <option value="graphic">Graphics</option>
                                                <option value="illustration">Illustration</option>
                                                <option value="music">Music</option>
                                                <option value="video">Video</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product_name">Product Name
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input type="text" id="product_name" class="text_field" placeholder="Enter your product name here..." name="item">
                                        <input type="hidden" id="" class="text_field" placeholder="Enter your product name here..." name="uid" value="<?php echo $_SESSION['id'] ;?>">

                                    </div>


                                    <div class="form-group">
                                        <label for="product_name">Demo link if any
                                           
                                        </label>
                                        <input type="text" id="" class="text_field" placeholder="Enter demo link " name="demo">
                                    </div>

                                    <div class="form-group no-margin">
                                        <p class="label">Product Description</p>
                                       <textarea name="description"></textarea>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules module--upload">
                                <div class="modules__title">
                                    <h3>Upload Files</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p>Upload Thumbnail
                                                <span>(JPEG or PNG)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="thumbnail">
                                                    <input type="file" id="thumbnail" class="files"  onchange="readURL();" name="thumbnail">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                            </div>
                                            <!-- end /.custom_upload -->
                                                
                                            <div class="progress_wrapper">
                                                <div class="labels clearfix">
                                                    <img src="" alt="" id="tmbpic">
                                                    
                                                  
                                                </div>
                                                
                                            </div>
                                            <!-- end /.progress_wrapper -->

                                            <span class="lnr upload_cross lnr-cross" id="closethumb" style="cursor:pointer;"></span>
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p>Upload Main File
                                                <span>(ZIP - All files)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="main_file">
                                                    <input type="file" id="main_file" class="files" onchange="GetFileSizeNameAndType()" name="mainfile">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                            </div>
                                            <!-- end /.custom_upload -->

                                            <div class="progress_wrapper">
                                                <div class="labels clearfix">
                                                    <p id="fn"></p>
                                                    <!-- <p id="ft"></p>
                                                    
                                                   <p id="divTotalSize"></p> -->
                                                </div>
                                                
                                            </div>
                                            <!-- end /.progress_wrapper -->

                                            <span class="lnr upload_cross lnr-cross" id="zipbtn" style="cursor:pointer;"></span>
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->

                                    <div class="form-group">
                                        <div class="upload_wrapper">
                                            <p>Upload Screenshots
                                                <span>(ZIP file of images)</span>
                                            </p>

                                            <div class="custom_upload">
                                                <label for="screenshot">
                                                    <input type="file" id="screenshot" class="files" onchange="readscreenshot();" name="screenshot">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                            </div>
                                            <!-- end /.custom_upload -->

                                            <div class="progress_wrapper">
                                                <div class="labels clearfix">
                                                    <img src="" alt="" id="screenpic">
                                                    
                                                  
                                                </div>
                                                
                                            </div>
                                            <!-- end /.progress_wrapper -->

                                            <span class="lnr upload_cross lnr-cross" id="screenbtn" style="cursor:pointer;"></span>
                                        </div>
                                        <!-- end /.upload_wrapper -->
                                    </div>
                                    <!-- end /.form-group -->
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Others Information</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="selected">Files Included</label>
                                                <textarea name="language" placeholder="separate them with comma's eg : Php,html ..."></textarea>
                                            </div>
                                            <!-- end /.form-group -->
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="browsers">Compatible Browsers</label>
                                                <textarea name="browsers" placeholder="separate them with comma's eg: Firefox,IE ..."></textarea>
                                            </div>
                                            <!-- end /.form-group -->
                                        </div>
                                        <!-- end /.col-md-6 -->
                                    </div>

                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="columns">Columns</label>
                                                <div class="select-wrap select-wrap2">
                                                    <select name="country" id="columns" class="text_field">
                                                        <option value="">Choose Columns</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4+</option>
                                                    </select>
                                                    <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dimension">Item Dimensions</label>
                                                <input type="text" id="dimension" class="text_field" placeholder="Ex: 1920x6000.">
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->
                                    </div>
                                    <!-- end /.row -->


                                    <div class="form-group">
                                    <label for="product_name"> Product version
                                           
                                           </label>
                                           <input type="text" id="" class="text_field" placeholder="Enter product version " name="version" >
                                    
                                    </div>

                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group radio-group">
                                                <p class="label">High Resolution</p>
                                                <div class="custom-radio">
                                                    <input type="radio" id="yes" class="" name="high_res">
                                                    <label for="yes">
                                                        <span class="circle"></span>Yes</label>
                                                </div>

                                                <div class="custom-radio">
                                                    <input type="radio" id="no" class="" name="high_res">
                                                    <label for="no">
                                                        <span class="circle"></span>no</label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->

                                        <!-- <div class="col-md-6">
                                            <div class="form-group radio-group">
                                                <p class="label">Retina Ready</p>
                                                <div class="custom-radio">
                                                    <input type="radio" id="ryes" class="" name="retina">
                                                    <label for="ryes">
                                                        <span class="circle"></span>Yes</label>
                                                </div>

                                                <div class="custom-radio">
                                                    <input type="radio" id="rno" class="" name="retina">
                                                    <label for="rno">
                                                        <span class="circle"></span>no</label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->
                                    </div>
                                    <!-- end /.row -->

                                    <div class="form-group">
                                        <label for="tags">Item Tags
                                            <span>(Max 10 tags)</span>
                                        </label>
                                        <textarea name="tags" id="tags" class="text_field" placeholder="Enter your item tags here..."></textarea>
                                    </div>
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                            <!-- end /.upload_modules -->

                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Others Information</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="rlicense">Regular License</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="rlicense" class="text_field" placeholder="00.00">
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->

                                        <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exlicense">Extended License</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" id="exlicense" class="text_field" placeholder="00.00">
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- end /.col-md-6 -->

                                        <div class="form-group">
                                        <label for="product_name">Product Price
                                            
                                        </label>
                                        <span class="input-group-addon">$</span>
                                        <input type="number" id="" class="text_field" placeholder="Enter your price" name="price">

                                    </div>

                                    </div>
                                    <!-- end /.row -->
                                    <div class="or"></div>
                                    
                                    <!-- end /.row -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->

                            <!-- submit button -->
                            <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Submit Your Item for Review</button>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Quick Upload Rules</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>More Upload Info</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->
                        </aside>
                        <!-- end /.sidebar -->
                    </div>
                    <!-- end /.col-md-4 -->
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

    <!-- script to get image info -->

    <script>
    function GetFileSizeNameAndType()
        {
        var fi = document.getElementById('main_file'); // GET THE FILE INPUT AS VARIABLE.

        var totalFileSize = 0;

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0)
        {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++)
            {
                //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                var fsize = fi.files.item(i).size;
                totalFileSize = totalFileSize + fsize;
                document.getElementById('fn').innerHTML =   '<div class="alert alert-warning" role="alert"><strong>Name:</strong>' + fi.files.item(i).name + '<br> <strong>Type:</strong>' + fi.files.item(i).type +  '<br> <strong>Filesize:</strong>' + Math.round(totalFileSize / 1024) + 'KB </div>';
                
                
                
                
                
                
                
            }
        }
        // document.getElementById('divTotalSize').innerHTML = "Total File(s) Size is <b>" + Math.round(totalFileSize / 1024) + "</b> KB";
    }


    // displaying thumbnail

    function readURL() {
            var mp = document.getElementById('thumbnail');
            if (mp.files && mp.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#tmbpic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(mp.files[0]);
            }
    }



    function readscreenshot() {
            var mp = document.getElementById('screenshot');
            if (mp.files && mp.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#screenpic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
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
    <!-- Dollarsoft js -->
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