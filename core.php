<?php

function  registeruser(){
    include 'db.php';
   extract($_POST);
   $datadded = date("jS F, Y");

   if (empty($name) || empty($email) || empty($username) || empty($password) || empty($contact)|| empty($gender)) {

    echo 'all';

       # code...
   }
   elseif(strlen($username) < 3){
        echo 'username must be 3 letters or above';
   }
   elseif($password != $cpass){
    echo 'notmatch';
   }

   elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo 'notemail';
   }
   elseif(! preg_match('/^[0-9]{10}+$/', $contact)){
    echo 'notphone';
   }

  
   else{
            $ch = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
            $ru = mysqli_num_rows($ch);

            if($ru >=1 ){
                echo 'Sorry username taken';
            }

            
            else{
                $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' ") ;
                $r1 = mysqli_num_rows($check);
                if($r1 >=1){
                    echo 'exist';
                } 
                else{
                        $password =md5($password);
                    $add = mysqli_query($conn,"INSERT INTO users(name,username,email,contact,gender,password,role,isnew,dateadded) VALUES('$name','$username','$email','$contact','$gender','$password','buyer','true','$datadded') ");
                    if($add){
                        $get= mysqli_query($conn,"SELECT * FROM users WHERE email='$email' ");
                        $r2= mysqli_fetch_array($get);
                        $_SESSION['name']=$r2['name'];
                        $_SESSION['email']=$r2['email'];
                        $_SESSION['id']=$r2['id'];
                        $_SESSION['username']=$r2['username'];
                        $_SESSION['role']=$r2['role'];
        
                        echo 'success';
                    }
                    else{
                        echo 'error';
                    }
                    
                }
            }

        }

  



}
function  logout(){
    // session_start();
    session_destroy();
    echo 'loggedout';
}

function login(){
    include 'db.php';
    $email= mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    if(empty($email) || empty($password)){

        echo 'all';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo 'notemail';
    }
    else{
        $password = md5($password);
        $login = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password' ");
        if($row=mysqli_fetch_array($login)){

            $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['id']=$row['id'];
                $_SESSION['username']=$row['username'];
                $_SESSION['role']=$row['role'];
                $isnew = $row['isnew'];
                if($isnew=="true"){
                    echo 'successlogin';
                }
                else{
                    echo 'successlogin1';

                }
               

        }
        else{
            echo 'errorlogin';
        }
    }
}


function settings(){
    include 'db.php';
    extract($_POST);
    if(empty($email)  || empty($username) || empty($name) || empty($country) || empty($billcountry)){
        echo 'all';
    }
    elseif($country == "-1"){
        echo 'Select country';
    }

    
    elseif($billcountry =="-1"){
        echo 'Select Billing Country';
    }
    elseif(empty($city)){
        echo 'Select city';
    }
    
    

    elseif($password != $cpass){
        echo 'notmatch';
    }
    

    else{
        if (empty($password)) {

            $password = $currentpass;
            $upt = mysqli_query($conn,"UPDATE users SET name='$name',username='$username',email='$email',password='$password',website='$website',country='$country',ph='$ph',bio='$bio',bfn='$bfn',bln='$bln',company='$company',billmail='$billmail',billcountry='$billcountry',address1='$address1',address2='$address2',city='$city',zip='$zip',facebook='$facebook',twitter='$twitter',google='$google',behance='$behance',dribble='$dribble',isnew='false'");
            if($upt){
                echo 'updated';
            }
            else{
                echo'errorupdate';
            }
            # code...
        }
        else {
            $password = md5($password);
            $upt = mysqli_query($conn,"UPDATE users SET name='$name',username='$username',email='$email',password='$password',website='$website',country='$country',ph='$ph',bio='$bio',bfn='$bfn',bln='$bln',company='$company',billmail='$billmail',billcountry='$billcountry',address1='$address1',address2='$address2',city='$city',zip='$zip',facebook='$facebook',twitter='$twitter',google='$google',behance='$behance',dribble='$dribble',isnew='false'");
            if($upt){
                echo 'updated';
            }
            else{
                echo'errorupdate';
            }
        }
    }
}


function updatepic(){
    include 'db.php';

    extract($_POST);


    if(empty($_FILES['image']['name']) && empty($_FILES['image1']['name'])){

        echo 'please Select image';
    }
    elseif(empty($_FILES['image']['name'])){
        $fileinfo=PATHINFO($_FILES["image1"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        if(move_uploaded_file($_FILES["image1"]["tmp_name"],"cover/" . $newFilename)){

            $update1 = mysqli_query($conn,"UPDATE users SET pimage='$pimage',cimage='$newFilename' WHERE id='$id'") ;
            if($update1){
                echo "coverpicture";
            }
            else {
                echo 'failed to update cover picture';
            }


        }
        else {
            echo "failed to uplaod cover picture";
        }
        
    }
    elseif(empty($_FILES['image1']['name'])){
        
        $fileinfo=PATHINFO($_FILES["image"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        if(move_uploaded_file($_FILES["image"]["tmp_name"],"profile/" . $newFilename)){

            $update2 = mysqli_query($conn,"UPDATE users SET pimage='$newFilename',cimage='$cimage' WHERE id='$id'") ;
            if($update2){
                echo "profilepicture";
            }
            else {
                echo 'failed to update profile picture';
            }


        }
        else {
            echo "failed to uplaod profile picture";
        }
    }

    else{

        $fileinfo=PATHINFO($_FILES["image"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["image1"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        if(move_uploaded_file($_FILES["image"]["tmp_name"],"profile/" . $newFilename) && move_uploaded_file($_FILES["image1"]["tmp_name"],"cover/" . $newFilename2)){
            $update3= mysqli_query($conn,"UPDATE users SET pimage='$newFilename',cimage='$newFilename2' WHERE id='$id' ");
            if($update3){
                echo 'bothpics';
            }
            else {
                echo 'failed to update profile and cover picture';
            }
        }
        else {
            echo 'failed to upload profile or cover picture';
        }

    }
}

function topbar(){

    if(!isset($_SESSION['pid'])){
        echo '<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 v_middle">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="logo image" class="img-fluid" style="width:200px;height:50px;">
                        </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <a href="regsell.php" class="author-area__seller-btn inline">Become a Seller</a>

                        <div class="author__notification_area">
                            <ul>
                                

                                
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-cart"></span>
                                        <span class="notification_count purch" id="ccounter">2</span>
                                    </div>

                                    <div class="dropdowns dropdown--cart">
                                        <div class="cart_area">
                                            <div class="cart_product">
                                                <div class="product__info">
                                                    <div class="thumbn">
                                                        <img src="images/capro1.jpg" alt="cart product thumbnail">
                                                    </div>

                                                    <div class="info">
                                                        <a class="title" href="single-product.php">Finance and Consulting Business Theme</a>
                                                        <div class="cat">
                                                            <a href="index.php#">
                                                                <img src="images/catword.png" alt="">Wordpress</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product__action">
                                                    <a href="index.php#">
                                                        <span class="lnr lnr-trash"></span>
                                                    </a>
                                                    <p>$60</p>
                                                </div>
                                            </div>
                                            <div class="cart_product">
                                                <div class="product__info">
                                                    <div class="thumbn">
                                                        <img src="images/capro2.jpg" alt="cart product thumbnail">
                                                    </div>

                                                    <div class="info">
                                                        <a class="title" href="single-product.php">Flounce - Multipurpose OpenCart Theme</a>
                                                        <div class="cat">
                                                            <a href="index.php#">
                                                                <img src="images/catword.png" alt="">Wordpress</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product__action">
                                                    <a href="index.php#">
                                                        <span class="lnr lnr-trash"></span>
                                                    </a>
                                                    <p>$60</p>
                                                </div>
                                            </div>
                                            <div class="total">
                                                <p>
                                                    <span>Total :</span>$80</p>
                                            </div>
                                            <div class="cart_action">
                                                <a class="go_cart" href="cart.php">View Cart</a>
                                                <a class="go_checkout" href="checkout.php">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--start .author__notification_area -->

                        <!--start .author-author__info-->
                        
                        <!--end /.author-author__info-->
                    </div>
                    <!-- end .author-area -->

                    <!-- author area restructured for mobile -->
                    <div class="mobile_content ">
                     <span class="lnr lnr-user menu_icon"></span>
                       

                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>
                            
                            <!--end /.author-author__info-->

                            <div class="author__notification_area">
                                <ul>
                                    
                                </ul>
                            </div>
                            <!--start .author__notification_area -->

                           

                            <div class="text-center">
                                <a href="signup.php" class="author-area__seller-btn inline">Become a Seller</a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.mobile_content -->
                </div>
                <!-- end /.col-md-5 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="Search product">
                                    <button type="submit" class="search-wrap__btn">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="has_dropdown">
                                    <a href="index.php">HOME</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="index.php">Home Multi Vendor</a>
                                            </li>
                                            <li>
                                                <a href="index-single.php">Home Two Single User</a>
                                            </li>
                                            <li>
                                                <a href="index3.php">Home Three Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="all-products-list.php">all product</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="all-products.php">Recent Items</a>
                                            </li>
                                            <li>
                                                <a href="all-products.php">Popular Items</a>
                                            </li>
                                            <li>
                                                <a href="index3.php">Free Templates</a>
                                            </li>
                                            <li>
                                                <a href="index.php#">Follow Feed</a>
                                            </li>
                                            <li>
                                                <a href="index.php#">Top Authors</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="index.php#">categories</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="category-grid.php">Popular Items</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Admin Templates</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Blog / Magazine / News</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Creative</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Corporate Business</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Resume Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">eCommerce</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Entertainment</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Landing Pages</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_megamenu">
                                    <a href="index.php#">Elements</a>
                                    <div class="dropdown_megamenu contained">
                                        <div class="megamnu_module">
                                            <div class="menu_items">
                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="accordion.php">Accordion</a>
                                                        </li>
                                                        <li>
                                                            <a href="alert.php">Alert</a>
                                                        </li>
                                                        <li>
                                                            <a href="brands.php">Brands</a>
                                                        </li>
                                                        <li>
                                                            <a href="buttons.php">Buttons</a>
                                                        </li>
                                                        <li>
                                                            <a href="cards.php">Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="charts.php">Charts</a>
                                                        </li>
                                                        <li>
                                                            <a href="content-block.php">Content Block</a>
                                                        </li>
                                                        <li>
                                                            <a href="dropdowns.php">Drpdowns</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="features.php">Features</a>
                                                        </li>
                                                        <li>
                                                            <a href="footer.php">Footer</a>
                                                        </li>
                                                        <li>
                                                            <a href="info-box.php">Info Box</a>
                                                        </li>
                                                        <li>
                                                            <a href="menu.php">Menu</a>
                                                        </li>
                                                        <li>
                                                            <a href="modal.php">Modal</a>
                                                        </li>
                                                        <li>
                                                            <a href="pagination.php">Pagination</a>
                                                        </li>
                                                        <li>
                                                            <a href="peoples.php">Peoples</a>
                                                        </li>
                                                        <li>
                                                            <a href="products.php">Products</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="progressbar.php">Progressbar</a>
                                                        </li>
                                                        <li>
                                                            <a href="social.php">Social</a>
                                                        </li>
                                                        <li>
                                                            <a href="tab.php">Tabs</a>
                                                        </li>
                                                        <li>
                                                            <a href="table.php">Table</a>
                                                        </li>
                                                        <li>
                                                            <a href="testimonials.php">Testimonials</a>
                                                        </li>
                                                        <li>
                                                            <a href="timeline.php">Timeline</a>
                                                        </li>
                                                        <li>
                                                            <a href="typography.php">Typography</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="has_megamenu">
                                    <a href="index.php#">Pages</a>
                                    <div class="dropdown_megamenu">
                                        <div class="megamnu_module">
                                            <div class="menu_items">
                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Product</li>
                                                        <li>
                                                            <a href="all-products.php">Products Grid</a>
                                                        </li>
                                                        <li>
                                                            <a href="all-products-list.php">Products List</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-grid.php">Category Grid</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-list.php">Category List</a>
                                                        </li>
                                                        <li>
                                                            <a href="search-product.php">Search Product</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.php">Single Product V1</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-v2.php">Single Product V2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-v3.php">Single Product V3</a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.php">Shopping Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.php">Checkout</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Author</li>
                                                        <li>
                                                            <a href="author.php">Author Profile</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-items.php">Author Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-reviews.php">Customer Reviews</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-followers.php">Followers</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-following.php">Following</a>
                                                        </li>
                                                        <li>
                                                            <a href="notification.php">Notifications</a>
                                                        </li>
                                                        <li>
                                                            <a href="message.php">Message Inbox</a>
                                                        </li>
                                                        <li>
                                                            <a href="message-compose.php">Message Compose</a>
                                                        </li>
                                                        <li>
                                                            <a href="favourites.php">Favorites Items</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Dashboard</li>
                                                        <li>
                                                            <a href="dashboard.php">Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-setting.php">Account Settings</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-purchase.php">Author Purchases</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-add-credit.php">Add Credits</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-statement.php">Statements</a>
                                                        </li>
                                                        <li>
                                                            <a href="invoice.php">Invoice</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-upload.php">Upload Item</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-manage-item.php">Edit Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-withdrawal.php">Withdrawals</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-manage-item.php">Manage Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="add-payment-method.php">Add Payment Method</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Customers</li>
                                                        <li>
                                                            <a href="support-forum.php">Support Forum</a>
                                                        </li>
                                                        <li>
                                                            <a href="support-forum-detail.php">Forum Details</a>
                                                        </li>
                                                        <li>
                                                            <a href="support-forum-form.php">Forum Form</a>
                                                        </li>
                                                        <li>
                                                            <a href="login.php">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="signup.php">Register</a>
                                                        </li>
                                                        <li>
                                                            <a href="recover-pass.php">Recovery Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-dashboard.php">Customer Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-downloads.php">Customer Downloads</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-info.php">Customer Info</a>
                                                        </li>
                                                    </ul>

                                                    <ul>
                                                        <li class="title">Blog</li>
                                                        <li>
                                                            <a href="blog1.php">Blog V-1</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog2.php">Blog V-2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-blog.php">Single Blog</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Other</li>
                                                        <li>
                                                            <a href="how-it-works.php">How It Works</a>
                                                        </li>
                                                        <li>
                                                            <a href="about.php">About Us</a>
                                                        </li>
                                                        <li>
                                                            <a href="pricing.php">Pricing Plan</a>
                                                        </li>
                                                        <li>
                                                            <a href="testimonial.php">Testimonials</a>
                                                        </li>
                                                        <li>
                                                            <a href="faq.php">FAQs</a>
                                                        </li>
                                                        <li>
                                                            <a href="affiliate.php">Affiliates</a>
                                                        </li>
                                                        <li>
                                                            <a href="term-condition.php">Terms &amp; Conditions</a>
                                                        </li>
                                                        <li>
                                                            <a href="event.php">Event</a>
                                                        </li>
                                                        <li>
                                                            <a href="event-detail.php">Event Detail</a>
                                                        </li>
                                                        <li class="has_badge">
                                                            <a href="badges.php">Badges</a>
                                                            <span class="badge">New</span>
                                                        </li>
                                                        <li>
                                                            <a href="404.php">404 Error page</a>
                                                        </li>
                                                        <li>
                                                            <a href="carieer.php">Job Posts</a>
                                                        </li>
                                                        <li>
                                                            <a href="job-detail.php">Job Details</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="contact.php">contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row-->
        </div>
        <!-- start .container -->
    </div>
    <!-- end /.mainmenu-->
</div>';
    }

    else{
        include'db.php';
        $getuser= mysqli_query($conn,"SELECT * FROM users WHERE id='".$_SESSION['pid']."' ");
        $row = mysqli_fetch_array($getuser);
        $pic = $row['pimage'];
        $gender = $row['gender'];
        $name = $row['name'];
        $current =$row['current'];
        if(empty($pic)){
            $pic = $gender.'.png';
        }


        echo '<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 v_middle">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="logo image" class="img-fluid" style="width:200px;height:50px;">
                        </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        <a href="sellreg.php" class="author-area__seller-btn inline">Become a Seller</a>

                        <div class="author__notification_area">
                            <ul>
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-alarm"></span>
                                        <span class="notification_count noti" id="mnoc">0</span>
                                    </div>

                                    <div class="dropdowns notification--dropdown">

                                        <div class="dropdown_module_header">
                                            <h4>My Notifications</h4>
                                            <a href="notifications.php">View All</a>
                                        </div>

                                        <div class="notifications_module">
                                           
                                            <!-- end /.notifications -->

                                            <div class="pusher">
                                            
                                            </div>
                                            <!-- end /.notifications -->

                                            
                                            <!-- end /.notifications -->

                                           
                                            <!-- end /.notifications -->
                                        </div>
                                        <!-- end /.dropdown -->
                                    </div>
                                </li>

                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-envelope"></span>
                                        <span class="notification_count msg"  id="messcount">0</span>
                                    </div>

                                    <div class="dropdowns messaging--dropdown">
                                        <div class="dropdown_module_header">
                                            <h4>My Messages</h4>
                                            <a href="message.php">View All</a>
                                        </div>

                                        <div class="messages" id="mymess">
                                            
                                            <!-- end /.message -->

                                            
                                            <!-- end /.message -->
                                        </div>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-cart"></span>
                                        <span class="notification_count purch"  id="ccounter"></span>
                                    </div>

                                    <div class="dropdowns dropdown--cart">
                                        <div class="cart_area">
                                            <div class="mycart">
                                            
                                            
                                            </div>
                                            
                                            <div class="total" id="mctotal">
                                                
                                            </div>
                                            <div class="cart_action">
                                                <a class="go_cart" href="cart.php">View Cart</a>
                                                <a class="go_checkout" href="checkout.php">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!--start .author__notification_area -->

                        <!--start .author-author__info-->
                        <div class="author-author__info inline has_dropdown">
                            <div class="author__avatar">
                                <img src="profile/'.$pic.'" alt="user avatar" style="width:50px;height:50px;border-radius:20px;">

                            </div>
                            <div class="autor__info">
                                <p class="name">
                                    '.$name.'
                                </p>
                                <p class="ammount">$ '.$current.'.00</p>
                            </div>

                            <div class="dropdowns dropdown--author">
                                <ul>
                                    <li>
                                        <a href="author1.php">
                                            <span class="lnr lnr-user"></span>Profile</a>
                                    </li>

                                    <li>
                                    <a href="profilepic.php">
                                        <span class="lnr lnr-user"></span>Profile Picture</a>
                                </li>
                                    <li>
                                        <a href="dashboard.php">
                                            <span class="lnr lnr-home"></span> Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.php">
                                            <span class="lnr lnr-cog"></span> Setting</a>
                                    </li>
                                    <li>
                                        <a href="cart.php">
                                            <span class="lnr lnr-cart"></span>Purchases</a>
                                    </li>
                                    <li>
                                        <a href="favourites.php">
                                            <span class="lnr lnr-heart"></span> Favourite</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-add-credit.php">
                                            <span class="lnr lnr-dice"></span>Add Credits</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-statement.php">
                                            <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-upload.php">
                                            <span class="lnr lnr-upload"></span>Upload Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-manage-item.php">
                                            <span class="lnr lnr-book"></span>Manage Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-withdrawal.php">
                                            <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                    </li>
                                    <li> 
                                        <form id="logout">
                                            <button class="author-area__seller-btn inline" type="submit"><span class="lnr lnr-exit"></span>Logout</button>
                                        </form
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--end /.author-author__info-->
                    </div>
                    <!-- end .author-area -->

                    <!-- author area restructured for mobile -->
                    <div class="mobile_content ">
                    
                        <span class="lnr lnr-user menu_icon"></span>

                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>
                            <div class="author-author__info">
                                <div class="author__avatar v_middle">
                                    <img src="profile/'.$pic.'" alt="user avatar" style="width:100px;height:100px;border-radius:20px;>
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                                        '.$name.'
                                    </p>
                                    <p class="ammount">$ '.$current.'.00</p>
                                </div>
                            </div>
                            <!--end /.author-author__info-->

                            <div class="author__notification_area">
                                <ul>
                                    <li>
                                        <a href="notification.php">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-alarm"></span>
                                                <span class="notification_count noti">25</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="message.php">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-envelope"></span>
                                                <span class="notification_count msg">6</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="cart.php">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-cart"></span>
                                                <span class="notification_count purch" id="ccounter1"></span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--start .author__notification_area -->

                            <div class="dropdowns dropdown--author">
                                <ul>
                                    <li>
                                        <a href="author1.php">
                                            <span class="lnr lnr-user"></span>Profile</a>
                                    </li>
                                    <li>
                                        <a href="profilepic.php">
                                            <span class="lnr lnr-user"></span>Profile picture</a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php">
                                            <span class="lnr lnr-home"></span> Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.php">
                                            <span class="lnr lnr-cog"></span> Setting</a>
                                    </li>
                                    <li>
                                        <a href="cart.php">
                                            <span class="lnr lnr-cart"></span>Purchases</a>
                                    </li>
                                    <li>
                                        <a href="favourites.php">
                                            <span class="lnr lnr-heart"></span> Favourite</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-add-credit.php">
                                            <span class="lnr lnr-dice"></span>Add Credits</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-statement.php">
                                            <span class="lnr lnr-chart-bars"></span>Sale Statement</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-upload.php">
                                            <span class="lnr lnr-upload"></span>Upload Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-manage-item.php">
                                            <span class="lnr lnr-book"></span>Manage Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-withdrawal.php">
                                            <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                    </li>
                                    <li>
                                    <a href="logout.php">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="text-center">
                                <a href="signup.php" class="author-area__seller-btn inline">Become a Seller</a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.mobile_content -->
                </div>
                <!-- end /.col-md-5 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                            <div class="mnotify">
                                
                            </div>
                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="Search product">
                                    <button type="submit" class="search-wrap__btn">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="has_dropdown">
                                    <a href="index.php">HOME</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="index.php">Home Multi Vendor</a>
                                            </li>
                                            <li>
                                                <a href="index-single.php">Home Two Single User</a>
                                            </li>
                                            <li>
                                                <a href="index3.php">Home Three Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="all-products-list.php">all product</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="all-products.php">Recent Items</a>
                                            </li>
                                            <li>
                                                <a href="all-products.php">Popular Items</a>
                                            </li>
                                            <li>
                                                <a href="index3.php">Free Templates</a>
                                            </li>
                                            <li>
                                                <a href="index.php#">Follow Feed</a>
                                            </li>
                                            <li>
                                                <a href="index.php#">Top Authors</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="index.php#">categories</a>
                                    <div class="dropdowns dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="category-grid.php">Popular Items</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Admin Templates</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Blog / Magazine / News</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Creative</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Corporate Business</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Resume Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">eCommerce</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Entertainment</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.php">Landing Pages</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_megamenu">
                                    <a href="index.php#">Elements</a>
                                    <div class="dropdown_megamenu contained">
                                        <div class="megamnu_module">
                                            <div class="menu_items">
                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="accordion.php">Accordion</a>
                                                        </li>
                                                        <li>
                                                            <a href="alert.php">Alert</a>
                                                        </li>
                                                        <li>
                                                            <a href="brands.php">Brands</a>
                                                        </li>
                                                        <li>
                                                            <a href="buttons.php">Buttons</a>
                                                        </li>
                                                        <li>
                                                            <a href="cards.php">Cards</a>
                                                        </li>
                                                        <li>
                                                            <a href="charts.php">Charts</a>
                                                        </li>
                                                        <li>
                                                            <a href="content-block.php">Content Block</a>
                                                        </li>
                                                        <li>
                                                            <a href="dropdowns.php">Drpdowns</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="features.php">Features</a>
                                                        </li>
                                                        <li>
                                                            <a href="footer.php">Footer</a>
                                                        </li>
                                                        <li>
                                                            <a href="info-box.php">Info Box</a>
                                                        </li>
                                                        <li>
                                                            <a href="menu.php">Menu</a>
                                                        </li>
                                                        <li>
                                                            <a href="modal.php">Modal</a>
                                                        </li>
                                                        <li>
                                                            <a href="pagination.php">Pagination</a>
                                                        </li>
                                                        <li>
                                                            <a href="peoples.php">Peoples</a>
                                                        </li>
                                                        <li>
                                                            <a href="products.php">Products</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li>
                                                            <a href="progressbar.php">Progressbar</a>
                                                        </li>
                                                        <li>
                                                            <a href="social.php">Social</a>
                                                        </li>
                                                        <li>
                                                            <a href="tab.php">Tabs</a>
                                                        </li>
                                                        <li>
                                                            <a href="table.php">Table</a>
                                                        </li>
                                                        <li>
                                                            <a href="testimonials.php">Testimonials</a>
                                                        </li>
                                                        <li>
                                                            <a href="timeline.php">Timeline</a>
                                                        </li>
                                                        <li>
                                                            <a href="typography.php">Typography</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="has_megamenu">
                                    <a href="index.php#">Pages</a>
                                    <div class="dropdown_megamenu">
                                        <div class="megamnu_module">
                                            <div class="menu_items">
                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Product</li>
                                                        <li>
                                                            <a href="all-products.php">Products Grid</a>
                                                        </li>
                                                        <li>
                                                            <a href="all-products-list.php">Products List</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-grid.php">Category Grid</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-list.php">Category List</a>
                                                        </li>
                                                        <li>
                                                            <a href="search-product.php">Search Product</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product.php">Single Product V1</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-v2.php">Single Product V2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-product-v3.php">Single Product V3</a>
                                                        </li>
                                                        <li>
                                                            <a href="cart.php">Shopping Cart</a>
                                                        </li>
                                                        <li>
                                                            <a href="checkout.php">Checkout</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Author</li>
                                                        <li>
                                                            <a href="author.php">Author Profile</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-items.php">Author Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-reviews.php">Customer Reviews</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-followers.php">Followers</a>
                                                        </li>
                                                        <li>
                                                            <a href="author-following.php">Following</a>
                                                        </li>
                                                        <li>
                                                            <a href="notification.php">Notifications</a>
                                                        </li>
                                                        <li>
                                                            <a href="message.php">Message Inbox</a>
                                                        </li>
                                                        <li>
                                                            <a href="message-compose.php">Message Compose</a>
                                                        </li>
                                                        <li>
                                                            <a href="favourites.php">Favorites Items</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Dashboard</li>
                                                        <li>
                                                            <a href="dashboard.php">Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-setting.php">Account Settings</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-purchase.php">Author Purchases</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-add-credit.php">Add Credits</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-statement.php">Statements</a>
                                                        </li>
                                                        <li>
                                                            <a href="invoice.php">Invoice</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-upload.php">Upload Item</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-manage-item.php">Edit Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-withdrawal.php">Withdrawals</a>
                                                        </li>
                                                        <li>
                                                            <a href="dashboard-manage-item.php">Manage Items</a>
                                                        </li>
                                                        <li>
                                                            <a href="add-payment-method.php">Add Payment Method</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Customers</li>
                                                        <li>
                                                            <a href="support-forum.php">Support Forum</a>
                                                        </li>
                                                        <li>
                                                            <a href="support-forum-detail.php">Forum Details</a>
                                                        </li>
                                                        <li>
                                                            <a href="support-forum-form.php">Forum Form</a>
                                                        </li>
                                                        <li>
                                                            <a href="login.php">Login</a>
                                                        </li>
                                                        <li>
                                                            <a href="signup.php">Register</a>
                                                        </li>
                                                        <li>
                                                            <a href="recover-pass.php">Recovery Password</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-dashboard.php">Customer Dashboard</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-downloads.php">Customer Downloads</a>
                                                        </li>
                                                        <li>
                                                            <a href="customer-info.php">Customer Info</a>
                                                        </li>
                                                    </ul>

                                                    <ul>
                                                        <li class="title">Blog</li>
                                                        <li>
                                                            <a href="blog1.php">Blog V-1</a>
                                                        </li>
                                                        <li>
                                                            <a href="blog2.php">Blog V-2</a>
                                                        </li>
                                                        <li>
                                                            <a href="single-blog.php">Single Blog</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Other</li>
                                                        <li>
                                                            <a href="how-it-works.php">How It Works</a>
                                                        </li>
                                                        <li>
                                                            <a href="about.php">About Us</a>
                                                        </li>
                                                        <li>
                                                            <a href="pricing.php">Pricing Plan</a>
                                                        </li>
                                                        <li>
                                                            <a href="testimonial.php">Testimonials</a>
                                                        </li>
                                                        <li>
                                                            <a href="faq.php">FAQs</a>
                                                        </li>
                                                        <li>
                                                            <a href="affiliate.php">Affiliates</a>
                                                        </li>
                                                        <li>
                                                            <a href="term-condition.php">Terms &amp; Conditions</a>
                                                        </li>
                                                        <li>
                                                            <a href="event.php">Event</a>
                                                        </li>
                                                        <li>
                                                            <a href="event-detail.php">Event Detail</a>
                                                        </li>
                                                        <li class="has_badge">
                                                            <a href="badges.php">Badges</a>
                                                            <span class="badge">New</span>
                                                        </li>
                                                        <li>
                                                            <a href="404.php">404 Error page</a>
                                                        </li>
                                                        <li>
                                                            <a href="carieer.php">Job Posts</a>
                                                        </li>
                                                        <li>
                                                            <a href="job-detail.php">Job Details</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="contact.php">contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row-->
        </div>
        <!-- start .container -->
    </div>
    <!-- end /.mainmenu-->
</div>';

    }
}
function ft(){
    echo ' <footer class="footer-area">
    <div class="footer-big section--padding">
        <!-- start .container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="info-footer">
                        <div class="info__logo">
                            <img src="images/logo.png" alt="footer logo" style="width:200px;height:50px;">
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
                                <a href="index.php#">How to Join Us</a>
                            </li>
                            <li>
                                <a href="index.php#">How It Work</a>
                            </li>
                            <li>
                                <a href="index.php#">Buying and Selling</a>
                            </li>
                            <li>
                                <a href="index.php#">Testimonials</a>
                            </li>
                            <li>
                                <a href="index.php#">Copyright Notice</a>
                            </li>
                            <li>
                                <a href="index.php#">Refund Policy</a>
                            </li>
                            <li>
                                <a href="index.php#">Affiliates</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.footer-menu -->

                    <div class="footer-menu">
                        <h4 class="footer-widget-title text--white">Help and FAQs</h4>
                        <ul>
                            <li>
                                <a href="index.php#">How to Join Us</a>
                            </li>
                            <li>
                                <a href="index.php#">How It Work</a>
                            </li>
                            <li>
                                <a href="index.php#">Buying and Selling</a>
                            </li>
                            <li>
                                <a href="index.php#">Testimonials</a>
                            </li>
                            <li>
                                <a href="index.php#">Copyright Notice</a>
                            </li>
                            <li>
                                <a href="index.php#">Refund Policy</a>
                            </li>
                            <li>
                                <a href="index.php#">Affiliates</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.footer-menu -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-4 col-md-12">
                    <div class="newsletter">
                        <h4 class="footer-widget-title text--white">Newsletter</h4>
                        <p>Subscribe to get the latest news, update and offer information. Don\'t worry, we won\'t send spam!</p>
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
                                    <a href="index.php#">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="fa fa-pinterest"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
                                        <span class="fa fa-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php#">
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
                            <a href="index.php#">YallDev</a>. All rights reserved. Created by
                            <a href="http://www.dollarstir.com">Dollarsoft</a>
                        </p>
                    </div>

                    <div class="go_top">
                        <span class="lnr lnr-chevron-up"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>';
}



// validating username

function validateusername(){
    include 'db.php';
    $keyword = $_POST['keyword'];
    $ch = mysqli_query($conn,"SELECT * FROM users WHERE username='$keyword'");
    $ru = mysqli_num_rows($ch);

    if(strlen($keyword) > 0 && strlen($keyword) <= 2 ){
        echo 'less';
    }

    elseif($ru >=1) {
        echo 'invalid';
        # code...
    }
    
    elseif(empty($keyword)) {
        echo 'nothing';
        # code...
    }
    else{
        echo 'valid';
    }

}



function addproduct(){
    include 'db.php';
    extract($_POST);
    $description = mysqli_real_escape_string($conn,$description);

    if(empty($item) || empty($category) || empty($description) || empty($price)){
        echo'all fields marked with * must be filled';
    }

    elseif(empty($_FILES['thumbnail']['name']) || empty($_FILES['mainfile']['name']) || empty($_FILES['screenshot']['name'])){
        echo "all files must be uploaded";
    }
    else {

        $fileinfo=PATHINFO($_FILES["thumbnail"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["mainfile"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        $fileinfo3=PATHINFO($_FILES["screenshot"]["name"]);
        $newFilename3=$fileinfo3['filename'] ."_". time() . "." . $fileinfo3['extension'];

        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"thumbnails/" . $newFilename) && move_uploaded_file($_FILES["mainfile"]["tmp_name"],"mainfiles/" . $newFilename2 ) && move_uploaded_file($_FILES["screenshot"]["tmp_name"],"screenshots/" . $newFilename3 )){
            $released = date('jS F, Y');
            $updated= $released;

            $apro= mysqli_query($conn,"INSERT INTO products (uid,item,category,description,thumbnail,mainfile,screenshot,language,browsers,version,tags,price,released,updated,status,demo) VALUES('$uid','$item','$category','$description','$newFilename','$newFilename2','$newFilename3','$language','$browsers','$version','$tags','$price','$released','$updated','active','$demo')");
            if($apro){
                echo'prodsuccess';
            }
            else {
                echo 'erroprod';
            }
        }
        else{
            echo 'erroprod1';
        }
         
    }

}


function updateproduct(){
    include 'db.php';
    extract($_POST);
    $description = mysqli_real_escape_string($conn,$description);

    if(empty($item) || empty($category) || empty($description) || empty($price)){
        echo'all fields marked with * must be filled';
    }

    elseif(empty($_FILES['thumbnail']['name']) && empty($_FILES['mainfile']['name']) && empty($_FILES['screenshot']['name'])){
       $updated = date('$jS F, Y');
        $upprod1 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$pic1',mainfile='$pic2',screenshot='$pic3',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo' WHERE id='$id' ");
        if($upprod1){
            echo 'update success';
        }
        else{
            echo "failed";
        }
    }
    elseif(empty($_FILES['thumbnail']['name']) && empty($_FILES['mainfile']['name'])){
        $fileinfo=PATHINFO($_FILES["screenshot"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        

        if( move_uploaded_file($_FILES["screenshot"]["tmp_name"],"screenshots/" . $newFilename)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$pic1',mainfile='$pic2',screenshot='$newFilename',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo'  WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }

    elseif(empty($_FILES['thumbnail']['name']) && empty($_FILES['screenshot']['name'])){
        $fileinfo=PATHINFO($_FILES["mainfile"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        

        if( move_uploaded_file($_FILES["mainfile"]["tmp_name"],"mainfiles/" . $newFilename)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$pic1',mainfile='$newFilename',screenshot='$pic3',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo'WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }

    elseif(empty($_FILES['mainfile']['name']) && empty($_FILES['screenshot']['name'])){
        $fileinfo=PATHINFO($_FILES["thumbnail"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        

        if( move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"thumbnails/" . $newFilename)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$newFilename',mainfile='$pic2',screenshot='$pic3',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo' WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }


    elseif(empty($_FILES['thumbnail']['name'])){

        $fileinfo=PATHINFO($_FILES["mainfile"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["screenshot"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        

        if( move_uploaded_file($_FILES["mainfile"]["tmp_name"],"mainfiles/" . $newFilename) && move_uploaded_file($_FILES["screenshot"]["tmp_name"],"screenshots/" . $newFilename2)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$pic1',mainfile='$newFilename',screenshot='$newFilename2',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo' WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }

    elseif(empty($_FILES['mainfile']['name'])){

        $fileinfo=PATHINFO($_FILES["thumbnail"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["screenshot"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        

        if( move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"thumbnails/" . $newFilename) && move_uploaded_file($_FILES["screenshot"]["tmp_name"],"screenshots/" . $newFilename2)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$newFilename',mainfile='$pic2',screenshot='$newFilename2',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo'  WHERE id='$id'");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }


    elseif(empty($_FILES['screenshot']['name'])){

        $fileinfo=PATHINFO($_FILES["thumbnail"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["mainfile"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        

        if( move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"thumbnails/" . $newFilename) && move_uploaded_file($_FILES["mainfile"]["tmp_name"],"mainfiles/" . $newFilename2)){
            
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$newFilename',mainfile='$newFilename2',screenshot='$pic3',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo'WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'failed to upload files';
        }
    }


    else {

        $fileinfo=PATHINFO($_FILES["thumbnail"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];

        $fileinfo2=PATHINFO($_FILES["mainfile"]["name"]);
        $newFilename2=$fileinfo2['filename'] ."_". time() . "." . $fileinfo2['extension'];

        $fileinfo3=PATHINFO($_FILES["screenshot"]["name"]);
        $newFilename3=$fileinfo3['filename'] ."_". time() . "." . $fileinfo3['extension'];

        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"thumbnails/" . $newFilename) && move_uploaded_file($_FILES["mainfile"]["tmp_name"],"mainfiles/" . $newFilename2 ) && move_uploaded_file($_FILES["screenshot"]["tmp_name"],"screenshots/" . $newFilename3 )){
            $updated= date('jS F, Y');

            $upprod2 = mysqli_query($conn,"UPDATE products SET item='$item',category='$category',description='$description',thumbnail='$newFilename',mainfile='$newFilename2',screenshot='$newFilename3',language='$language',browsers='$browsers',version='$version',tags='$tags',price='$price',updated='$updated',demo='$demo'WHERE id='$id' ");
            if($upprod2){
                echo 'update success';
            }
            else{
                echo "failed";
            }
        }
        else{
            echo 'erroprod1';
        }
         
    }

}
function displayproducts(){
    include 'db.php';

    $getall= mysqli_query($conn,"SELECT * FROM products ORDER BY ID DESC");
   
   
    
    while ( $row = mysqli_fetch_array($getall)) {
        $itemid =$row['id'];

        $csa = mysqli_query($conn,"SELECT * FROM sales WHERE prodid ='$itemid'");
                                         $rca = mysqli_num_rows($csa);

        $getuser= mysqli_query($conn,"SELECT * FROM users where id='".$row['uid']."'");
                                        $ru= mysqli_fetch_array($getuser);
                                        

        echo' <div class="col-lg-4 col-md-6">
        <!-- start .single-product -->
        <div class="product product--card">

            <div class="product__thumbnail">
                <img src="thumbnails/'.$row['thumbnail'].'" alt="Product Image">
                <div class="prod_btn">
                    <a href="product/'.$row['id'].'" class="transparent btn--sm btn--round">More Info</a>
                    <a href="'.$row['demo'].'" target="blank" class="transparent btn--sm btn--round">Live Demo</a>
                </div>
                <!-- end /.prod_btn -->
            </div>
            <!-- end /.product__thumbnail -->

            <div class="product-desc">
                <a href="all-products.php#" class="product_title">
                    <h4>'.$row['item'].'</h4>
                </a>
                <ul class="titlebtm">
                    <li>';
                    if(empty($ru['pimage'])){
                        echo '<img class="auth-img" src="profile/'.$ru['gender'].'.png" alt="author image">
                        <p>
                            <a href="author/'.$ru['username'].'">'.$ru['username'].'</a>
                        </p>';
                    }else {
                        echo '<img class="auth-img" src="profile/'.$ru['pimage'].'" alt="author image">
                        <p>
                            <a href="author/'.$ru['username'].'">'.$ru['username'].'</a>
                        </p>';
                        
                    }
                    
                    
                    
                    
                    echo '
                    </li>
                    <li class="product_cat">
                        <a href="all-products.php#">
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

}


function getauthornewitems($username){
    include 'db.php';
    $gu = mysqli_query($conn,"SELECT * FROM users WHERE  username='$username'");
    $rr= mysqli_fetch_array($gu);
    $uid=$rr['id'];
    $gs = mysqli_query($conn,"SELECT * FROM products WHERE  uid='$uid'");


    while ($row=mysqli_fetch_array($gs)) {

        echo ' <div class="col-lg-6 col-md-6">
        <!-- start .single-product -->
        <div class="product product--card">

            <div class="product__thumbnail">
                <img src="thumbnails/'.$row['thumbnail'].'" alt="Product Image">
                <div class="prod_btn">
                    <a href="product/'.$row['id'].'" class="transparent btn--sm btn--round">More Info</a>
                    <a href="'.$row['demo'].'" class="transparent btn--sm btn--round">Live Demo</a>
                </div>
                <!-- end /.prod_btn -->
            </div>
            <!-- end /.product__thumbnail -->

            <div class="product-desc">
                <a href="product/'.$row['id'].'" class="product_title">
                    <h4>'.$row['item'].'</h4>
                </a>
                <ul class="titlebtm">
                    <li>';
                       if(empty($rr['pimage'])){
                           echo ' <img class="auth-img" src="profile/'.$rr['gender'].'.png" alt="author image">';
                       }
                       else{
                           echo ' <img class="auth-img" src="profile/'.$rr['pimage'].'" alt="author image">';
                           
                       }
                       echo'
                        <p>
                            <a href="author/'.$username.'">'.$username.'</a>
                        </p>
                    </li>
                    <li class="product_cat">
                        <a href="single-product.php?">
                            <img src="images/cathtm.png" alt="category image">'.$row['category'].'</a>
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
                        <span class="lnr lnr-heart"></span> 48</p>
                </div>

                <div class="rating product--rating">
                    <ul>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star-half-o"></span>
                        </li>
                    </ul>
                </div>

                <div class="sell">
                    <p>
                        <span class="lnr lnr-cart"></span>
                        <span>50</span>
                    </p>
                </div>
            </div>
            <!-- end /.product-purchase -->
        </div>
        <!-- end /.single-product -->
    </div>';
        # code...
    }
}

function addtocart(){
    include 'db.php';
    extract($_POST);

    $ck = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$uid' AND prodid='$prodid'");
    $cc= mysqli_num_rows($ck);
    if ($cc >=1) {
        echo 'alreadyincart';
        # code...
    }
    else {
        $add = mysqli_query($conn,"INSERT  INTO cart (prodid,uid,status) VALUES ('$prodid','$uid','incart')");
        if ($add) {
            echo'addedtocart';
            # code...
        }
        else {
            echo 'didntaddtocart';
        }
    }
}


function delectcart(){
    include 'db.php';
    extract($_POST);
    $del =mysqli_query($conn,"DELETE FROM cart WHERE id='$cid'");
    if($del){
        echo 'cartdeleted';
    }
}

function morefromuser($uid,$username,$pimage,$gender,$prod){
    include 'db.php';
    $get= mysqli_query($conn,"SELECT * FROM products WHERE uid='$uid'AND id!='$prod'  ORDER BY id DESC");
    while ($rm=mysqli_fetch_array($get)) {
        $itemid = $rm['id'];


        $csa = mysqli_query($conn,"SELECT * FROM sales WHERE prodid ='$itemid'");
                                         $rca = mysqli_num_rows($csa);

        echo '<div class="col-lg-4 col-md-6">
        <!-- start .single-product -->
        <div class="product product--card">

            <div class="product__thumbnail">
                <img src="thumbnails/'.$rm['thumbnail'].'" alt="Product Image">
                <div class="prod_btn">
                    <a href="product/'.$rm['id'].'" class="transparent btn--sm btn--round">More Info</a>
                    <a href="'.$rm['demo'].'" class="transparent btn--sm btn--round">Live Demo</a>
                </div>
                <!-- end /.prod_btn -->
            </div>
            <!-- end /.product__thumbnail -->

            <div class="product-desc">
                <a href="product/'.$rm['id'].'" class="product_title">
                    <h4>'.$rm['item'].'</h4>
                </a>
                <ul class="titlebtm">
                    <li>';
                        if(empty($pimage)){
                            echo ' <img class="auth-img" src="profile/'.$gender.'.png" alt="author image">';
                        }
                        else{
                            echo ' <img class="auth-img" src="profile/'.$pimage.'" alt="author image">';

                        }
                       echo'
                        <p>
                            <a href="author/'.$username.'">'.$username.'</a>
                        </p>
                    </li>
                    <li class="product_cat">
                        <a href="single-product.php#">
                            <img src="images/cathtm.png" alt="image">'.$rm['category'].'</a>
                    </li>
                </ul>

                <p>';
                $txt = $rm['description'];
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
                    <span>$'.$rm['price'].'</span>
                    <p>
                        <span class="lnr lnr-heart"></span> 48</p>
                </div>

                <div class="rating product--rating">
                    <ul>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star"></span>
                        </li>
                        <li>
                            <span class="fa fa-star-half-o"></span>
                        </li>
                    </ul>
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

}

function adsales(){
    include 'db.php';
    $mim = $_POST['mim'];
    $myref =$_POST['rr'];
    $total1 =0;
    $total2=0;
    
    
    
    $getcart = mysqli_query($conn,"SELECT * FROM cart WHERE uid='$mim' AND status='incart'");
    while ($row= mysqli_fetch_array($getcart)) {
        $prodid= $row['prodid'];
    
        $gtp = mysqli_query($conn,"SELECT * FROM products WHERE id='$prodid' ");
        $r2 = mysqli_fetch_array($gtp);
        $price= $r2['price'];
        $thumbnail = $r2['thumbnail'];
        $mainfile=$r2['mainfile'];
        $item =$r2['item'];
        $category =$r2['category'];
        $description= mysqli_real_escape_string($conn,$r2['description']);
        $aid= $r2['uid'];
        $gettt = mysqli_query($conn,"SELECT * FROM users WHERE id='$aid'");
        $rcc= mysqli_fetch_array($gettt);
        $author = $rcc['username'];
        $devid = $r2['uid'];
        $inbalance = ($rcc['current']);
        $fin = $inbalance + floatval($price);


        $mansa = mysqli_query($conn,"SELECT * FROM users WHERE id='$mim'");
        $raza = mysqli_fetch_array($mansa);
        $hisname = $raza['name'];
        $note = "purchased";
        $madepic= $raza['pimage'];
        $madegend =$raza['gender'];

        $timego = date("h:i a");
        $timing = strtotime($timego);

        $datadded = date("jS F, Y");
        $tt = date("h:i A");
        $ins= mysqli_query($conn,"INSERT INTO sales(uid,prodid,price,ref,dateadded,tt,downloadlink,item,category,description,author,thumbnail,devid) VALUES ('$mim','$prodid','$price','$myref','$datadded','$tt','$mainfile','$item','$category','$description','$author','$thumbnail','$devid')");
        $ins2 = mysqli_query($conn,"INSERT INTO statement(uid,devid,item,itemid,type,price,dateadded,ref) VALUES ('$mim','$devid','$item','$prodid','sale','$price','$datadded','$myref')");
        $del= mysqli_query($conn,"DELETE FROM cart WHERE uid='$mim' AND status='incart' ");

        $up =mysqli_query($conn,"UPDATE users SET previous='$inbalance',current='$fin' WHERE id='$aid'");

        $noti = mysqli_query($conn,"INSERT INTO notification(madeby,madename,madepic,madegend,item,itemlink,madeto,note,madeon,timing,status) VALUES ('$mim','$hisname','$madepic','$madegend','$item','$prodid','$devid','$note','$datadded','$timing','unread')");

        if($ins && $del && $up && $noti && $ins2){
            echo 'All done';
        }
        else{
            echo 'failed';
        }
        
        

    }
    


    


   
}

function userpurchased($uid){
    include 'db.php';

    $sp= mysqli_query($conn,"SELECT * FROM sales WHERE uid='$uid'");
    $rpc = mysqli_num_rows($sp);
    echo $rpc;
}

function purchaseditem($uid){

    include 'db.php';
    $pa = mysqli_query($conn,"SELECT * FROM sales WHERE uid='$uid' ORDER BY id DESC ");
    while ($row=mysqli_fetch_array($pa)) {
        $prodid =$row['prodid'];
        extract($row);

        

        echo' <div class="col-md-12">
        <div class="single_product clearfix">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product__description">
                        <img src="thumbnails/'.$thumbnail.'" alt="Purchase image" style="width:150px;height:100px;">
                        <div class="short_desc">
                            <h4>'.$item.'</h4>
                            <p>';

                            $txt = $description;
                                // $txt = strip_tags($txt);
                                if (strlen($txt) > 50) {

                                    // truncate string
                                    $stringCut = substr($txt, 0, 50);
                                    $endPoint = strrpos($stringCut, ' ');
                                
                                    //if the string doesn't contain any space then it will cut without word basis.
                                    $txt = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                    $txt = $txt.'..';
                                    
                                }

                                echo $txt.'
                            
                            </p>
                        </div>
                    </div>
                    <!-- end /.product__description -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-3 col-md-3 col-6 xs-fullwidth">
                    <div class="product__additional_info">
                        <ul>
                            <li>
                                <p>
                                    <span>Date: </span> '.$dateadded.'</p>
                            </li>
                            <li class="license">
                                <p>
                                    <span>Licence:</span> Regular</p>
                            </li>
                            <li>
                                <p>
                                    <span>Author:</span> '.$author.'</p>
                            </li>
                            <li>
                                <a href="dashboard-purchase.php#">
                                    <img src="images/catword.png" alt="">'.$category.'</a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.product__additional_info -->
                </div>
                <!-- end /.col-md-3 -->

                <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                    <div class="product__price_download">
                        <div class="item_price v_middle">
                            <span>$'.$price.'</span>
                        </div>
                        <div class="item_action v_middle">
                            <a href="mainfiles/'.$downloadlink.'" class="btn btn--md btn--round" download>Download Item</a>
                            <a href="dashboard-purchase.php#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
                                <P class="rate_it">Rate Now</P>
                                <div class="rating product--rating">
                                    <ul>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-o"></span>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                            <!-- end /.rating_btn -->
                        </div>
                        <!-- end /.item_action -->
                    </div>
                    <!-- end /.product__price_download -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
        </div>
        <!-- end /.single_product -->
    </div>';
        # code...
    }
}


function addmessage(){
    include 'db.php';
    $username= mysqli_real_escape_string($conn,$_POST['username']);

    


    extract($_POST);
    $message =mysqli_real_escape_string($conn,$message);
    $r1 = "yall";
    $r2 =rand(1111111,9999999);
    $ref = $r1.''.$r2;

    $mm = explode("@",$username);
    $u1 = $mm[0];
    $u2 ='yalldev.com';
    $u3 = $u1.'@'.$u2;

    if($username == $u3){
        
        $username= $u1;
    }
    $validate=mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
    $rv = mysqli_num_rows($validate);
    $rnn= mysqli_fetch_array($validate);

    $timego = date("h:i a");
    $timing = strtotime($timego);
    $zip = new ZipArchive();
$filename = "upload/".$ref.".zip";

if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit("cannot open <$filename>\n");
}
$thisdir = "attachment";


// $zip->addFile($thisdir."/avatar_1595178036.jpg","/avatar_1595178036.jpg");

// $zip->addFile("Male.png");

// $zip->addFile($thisdir . "/too.php","/testfromfile.php");




    if($rv >= 1){
        $receiver =$rnn['id'];  
        if(!empty($_FILES['doc']['name'])){
            $output_dir = "attachment/";/* Path for file upload */
             $fileCount = count($_FILES["doc"]['name']);
            for($i=0; $i < $fileCount; $i++)
            
            {
                $RandomNum   = time();
            
                $ImageName      = str_replace(' ','-',strtolower($_FILES['doc']['name'][$i]));
                $ImageType      = $_FILES['doc']['type'][$i]; /*"image/png", image/jpeg etc.*/
            
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
                
                $ret[$NewImageName]= $output_dir.$NewImageName;
                
                /* Try to create the directory if it does not exist */
                
                            
                if( move_uploaded_file($_FILES["doc"]["tmp_name"][$i],$output_dir."/".$NewImageName) ){
                    $att = mysqli_query($conn,"INSERT INTO attachment (sender,receiver,doc,timing,ref) VALUES ('$sender','$receiver','$NewImageName','$timing','$ref')");

                    // $zip->addFile($thisdir."/".$NewImageName,"/".$NewImageName);
                        $zip->addFile($thisdir."/".$NewImageName."","/".$NewImageName."");



                }
                
            }
        $zip->close();

            
        }
        
        $ins= mysqli_query($conn,"INSERT INTO messages (sender,receiver,message,timing,status,ref) VALUES ('$sender','$receiver','$message','$timing','unread','$ref')") ;

        if ($ins) {

            echo 'messagesent';
            # code...
        }
        else {
            echo 'failed to send message';
        }

    }
    else{
        echo 'notfound';
    }

}


function statement($uid){
    include 'db.php';

    $get = mysqli_query($conn,"SELECT * FROM statement WHERE uid='$uid'");
    while ($row= mysqli_fetch_array($get)) {
        $divi= $row['devid'];
        $tp = $row['type'];
        if($uid  == $divi){
            $tp = 'purchased';
        }

        $selu =  mysqli_query($conn,"SELECT * FROM users WHERE id= '$divi'");
        $rum = mysqli_fetch_array($selu);
        $username = $rum['username'];

            echo '<tr>
            <td>'.$row['dateadded'].'</td>
            <td>'.$row['ref'].'</td>
            <td class="author">'.$username.'</td>
            <td class="detail">
                <a href="product/'.$row['itemid'].'">'.$row['item'].'</a>
            </td>
            <td class="type">
                <span class="sale">'.$tp.'</span>
            </td>
            <td>$'.$row['price'].'</td>
            <td class="earning">$'.$row['price'].'</td>
            <td class="action">
                <a href="invoice/'.$row['ref'].'">view</a>
            </td>
        </tr>';
        # code...
    }

}

function invoice($ref){
    include 'db.php';
    $selv = mysqli_query($conn,"SELECT * FROM statement WHERE ref='$ref'");
    // $rvo = mysqli_fetch_array($selv);
    // $uid = $myid;
    // $sel = mysqli_query($conn,"SELECT * FROM users WHERE id='$uid'");
    // $ruu = mysqli_fetch_array($sel);
    
   
    $tt = 0;
    while($row = mysqli_fetch_array($selv)) {

        $tt= $tt + $row['price'];

        $devid = $row['devid'];
         $sel2 = mysqli_query($conn,"SELECT * FROM users WHERE id='$devid'");
         $rus= mysqli_fetch_array($sel2);
        


        echo '
    

    
                    <tr>
                        <td>'.$row['dateadded'].'</td>
                        <td class="author">'.$rus['username'].'</td>
                        <td class="detail">
                            <a href="invoice.php#">'.$row['item'].'</a>
                        </td>
                        <td>Regular</td>
                        <td>$'.$row['price'].'</td>
                        <td>$'.$row['price'].'</td>
                    </tr>
               ';
        # code...
    }


   
}

function addpaymethod(){
    include 'db.php';
    extract($_POST);
    $insp = mysqli_query($conn,"INSERT INTO paymethod(uid,method,cardnum,em,ey,cvv,monum,monam,paymail) VALUES ('$uid','$card','$cnum','$months','$years','$cvc','$monum','$moname','$paymail')");
    if($insp){
        echo 'methodadded';
    }
    else{
        echo 'failed to add payment method';
    }
}


function mymethods($uid){
    include 'db.php';

    $mmed = mysqli_query($conn,"SELECT * FROM paymethod WHERE uid='$uid'");
    while ($row=mysqli_fetch_array($mmed)) {
        $mycnum = substr($row['cardnum'],-4);
        if($row['method']=="mastercard"){
            $mymethod = "Master Card - Account ending in ".$mycnum."";
        }
        elseif ($row['method']=="visacard") {
           $mymethod ="Visa Card - Account ending in ".$mycnum."";
        }
        elseif ($row['method']=="Mobilemoney") {
            $mymethod ="Mobile Money - (".$row['monum'].")";
         }

         elseif ($row['method']=="paypal") {
            $mymethod ="Paypal - (".$row['paymail'].")";
         }
         else{
             $mymethod="No payment method available";
         }

        echo ' <div class="custom-radio">
        <input type="radio" id="'.$row['id'].'" class="mymtt" name="paytype" value="'.$row['method'].'">
        <label for="'.$row['id'].'">
            <span class="circle"></span>'.$mymethod.'</label>
    </div>';
        # code...
    }
}

function mybalance($uid){
    include'db.php';
    $getuser= mysqli_query($conn,"SELECT * FROM users WHERE id='$uid' ");
    $row = mysqli_fetch_array($getuser);
    
    $current =$row['current'];

    echo $current;
}


function redrawalls(){
    include "db.php";
    $datadded = date("jS F, Y");
    extract($_POST);

    if(empty($amount)){

        echo "please enter amount";
    }

    elseif (!preg_match("/^[0-9]/",$amount)) {
       echo 'please enter valid amount';
    }
    elseif ($mybalance < $amount) {
        echo 'insufficient balance';
    }

    elseif (empty($paytype)) {
        echo 'select payment mehtod';
    }
    else{
        if($paytype=="visacard" || $paytype=="mastercard"){

            $redraw = mysqli_query($conn,"INSERT INTO  redrawals(uid,paytype,cardnum,em,ey,cvv,status,dateadded,amount) VALUES ('$uid','$paytype','$cnum','$months','$years','$cvc','pending','$datadded','$amount')");
            if($redraw){
                echo 'request sent';
            }
            else {
                echo 'faield to send redrawall request';
            }
        }
    
        elseif($paytype=="Mobilemoney" ){
    
            $redraw = mysqli_query($conn,"INSERT INTO  redrawals(uid,paytype,monum,monam,status,dateadded,amount) VALUES ('$uid','$paytype','$monum','$moname','pending','$datadded','$amount')");
            if($redraw){
                echo 'request sent';
            }
            else {
                echo 'faield to send redrawall request';
            }
    
        }

        elseif($paytype=="paypal" ){
    
            $redraw = mysqli_query($conn,"INSERT INTO  redrawals(uid,paytype,paymail,status,dateadded,amount) VALUES ('$uid','$paytype','$paymail','pending','$datadded','$amount')");
            if($redraw){
                echo 'request sent';
            }
            else {
                echo 'faield to send redrawall request';
            }
    
        }
    }
    
}


function handlecard(){
    include 'db.php';

    // extract($_POST);
    $theid = $_POST['theid'];


    $vvey= mysqli_query($conn,"SELECT * FROM paymethod WHERE id='$theid' ");
    $rvh = mysqli_fetch_array($vvey);

    if($rvh['method']=="mastercard" || $rvh['method']=="visacard"){

        echo'<div class="form-group" id="cnum">
    <label for="card_number">Card Number</label>
    <input id="card_number" type="text" name="cnum" class="text_field" placeholder="Enter your card number here..." value="'.$rvh['cardnum'].'">
</div>


<!-- lebel for date selection -->
<label for="name" id="expa">Expire Date</label>
<div class="row">
    <div class="col-md-6">
        <div class="form-group" id="cmo">
            <div class="select-wrap select-wrap2">
                <select name="months" id="name">
                    <option value="'.$rvh['em'].'">'.$rvh['em'].'</option>
                    <option value="Jan">jan</option>
                    <option value="Feb">Feb</option>
                    <option value=Mar">Mar</option>
                    <option value="Apr">Apr</option>
                    <option value="May">May</option>
                    <option value="Jun">Jun</option>
                    <option value="Jul">Jul</option>
                    <option value="Aug">Aug</option>
                    <option value="Sep">Sep</option>
                    <option value="Oct">Oct</option>
                    <option value="Nov">Nov</option>
                    <option value="Dec">Dec</option>
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
                <option value="'.$rvh['ey'].'">'.$rvh['ey'].'</option>
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
            <input id="cv_code" type="text" name="cvc" class="text_field" placeholder="Enter code here..." value="'.$rvh['cvv'].'">
        </div>

        <!-- <div class="custom-radio">
            <input type="radio" id="opt8" class="" name="sfn">
            <label for="opt8">
                <span class="circle"></span>Save card for next time</label>
        </div> -->

        <!-- <button type="submit" class="btn btn--round btn--default">Add  Now</button> -->
    </div>
</div>';
    }
    elseif ($rvh['method']=="paypal") {
        echo'
    
    <div class="form-group" id="paymail">
        <label for="card_number">Paypal Email/Payment address</label>
        
        <input id="card_number" type="text" name="paymail" class="text_field" placeholder="Enter your paypal email address here..." value="'.$rvh['paymail'].'">
    </div>
    
    <!-- lebel for date selection -->
   
    
    <!-- end /.row -->
    
    <div class="row">
        <div class="col-md-6">
           
    
            <!-- <div class="custom-radio">
                <input type="radio" id="opt8" class="" name="sfn">
                <label for="opt8">
                    <span class="circle"></span>Save card for next time</label>
            </div> -->
    
            <!-- <button type="submit" class="btn btn--round btn--default">Add  Now</button> -->
        </div>
    </div>';
    }

    elseif ($rvh['method']=="Mobilemoney") {

        echo'

<div class="form-group" id="monum">
    <label for="card_number">Mobile money Number</label>
    <input id="card_number" name="monum" type="text" class="text_field" placeholder="Enter your mobile money number here..." value="'.$rvh['monum'].'">
</div>

<div class="form-group" id="monam">
    <label for="card_number">Mobile Money Account Name</label>
    <input id="card_number" type="text" name="moname" class="text_field" placeholder="Enter your Account name here..."  value="'.$rvh['monam'].'">
</div>





<!-- end /.row -->

<div class="row">
    <div class="col-md-6">
        

        <!-- <div class="custom-radio">
            <input type="radio" id="opt8" class="" name="sfn">
            <label for="opt8">
                <span class="circle"></span>Save card for next time</label>
        </div> -->

        <!-- <button type="submit" class="btn btn--round btn--default">Add  Now</button> -->
    </div>
</div>';
        # code...
    }
}


function redrawallhistory($uid){
    include 'db.php';
    $rhis= mysqli_query($conn,"SELECT * FROM redrawals WHERE uid='$uid'  ORDER BY id DESC");
    while ($myhis = mysqli_fetch_array($rhis)) {

        if($myhis['status']=="pending"){

            echo'<tr>
            <td>'.$myhis['dateadded'].'</td>
            <td>'.$myhis['paytype'].'</td>
            <td class="bold">$'.$myhis['amount'].'</td>
            <td class="pending">
                <span>Pending</span>
            </td>
        </tr>';
        }
        elseif($myhis['status']=="paid"){
            echo '<tr>
            <td>'.$myhis['dateadded'].'</td>
            <td>'.$myhis['paytype'].'</td>
            <td class="bold">$'.$myhis['amount'].'</td>
            <td class="paid">
                <span>Paid</span>
            </td>
        </tr>';
        }
        # code...
    }




   

}

function postcomment(){
    include 'db.php';
    extract($_POST);

    $timego = date("h:i a");
     $timing = strtotime($timego);

    $ins = mysqli_query($conn,"INSERT INTO comments (cid,prodid,comment,timing) VALUES ('$cid','$prodid','$comment','$timing')");
    if($ins){
        echo "commentsuccess";
    }
    else {
        echo "failed to post comment";
    }
}

function postreply(){
    include 'db.php';
    extract($_POST);

    $timego = date("h:i a");
    $timing = strtotime($timego);

    $insr = mysqli_query($conn,"INSERT INTO replies (comid,uid,reply,timing) VALUES ('$comid','$myid','$reply','$timing')");
    if ($insr) {
        echo "replied";
        # code...
    }
    else{
        echo 'failed to reply';
    }
}

function delreply(){
    include 'db.php';
    $repid = $_POST['repid'];
    $derep = mysqli_query($conn,"DELETE FROM replies WHERE id ='$repid' ");
    if ($derep) {
        echo 'reply delected';
        # code...
    }
    else {
        echo 'failed to delete reply';
    }
}
?>