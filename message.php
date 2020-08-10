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


    <title>YallDev - Messages</title>

    <!-- inject:css -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.aazztech.com/theme/html/martplace/dist/images/favicon.png">
</head>

<body class="preload messages-page">

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
                                <a href="message.html#">Message</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Messages Box</h1>
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
            START MESSAGE AREA
    =================================-->
    <section class="message_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content_title">
                        <h3>Messages</h3>
                    </div>
                    <!-- end /.content_title -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-lg-5">
                    <div class="cardify messaging_sidebar">
                        <div class="messaging__header">
                            <div class="messaging_menu">
                                <a href="message.html#" id="drop2" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="lnr lnr-inbox" ></span>Inbox
                                    <span class="msg" id="myboss">0</span>
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>

                                <ul class="custom_dropdown messaging_dropdown dropdown-menu" aria-labelledby="drop2">
                                    <li>
                                        <a href="message.html#">
                                            <span class="lnr lnr-inbox"></span>Inbox</a>
                                    </li>
                                    <li>
                                        <a href="message.html#">
                                            <span class="fa fa-star-o"></span>Starred</a>
                                    </li>
                                    <li>
                                        <a href="message.html#">
                                            <span class="lnr lnr-dice"></span>Sent</a>
                                    </li>
                                    <li>
                                        <a href="message.html#">
                                            <span class="lnr lnr-trash"></span>Trash</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.messaging_menu -->

                            <div class="messaging_action">
                                <span class="lnr lnr-trash"></span>
                                <span class="lnr lnr-sync"></span>

                                <a href="message-compose.html" class="btn btn--round btn--sm">
                                    <span class="lnr lnr-pencil"></span>
                                    <span class="text">Compose</span>
                                </a>
                            </div>
                            <!-- end /.messaging_action -->
                        </div>
                        <!-- end /.messaging__header -->

                        <div class="messaging__contents">
                            <div class="message_search">
                                <input type="text" placeholder="Search messages...">
                                <span class="lnr lnr-magnifier"></span>
                            </div>

                            <div class="messages" id="minibox">
                               
                                <!-- end /.message -->

                                
                                <!-- end /.message -->
                            </div>
                            <!-- end /.messages -->
                        </div>
                        <!-- end /.messaging__contents -->
                    </div>
                    <!-- end /.cardify -->
                </div>
                <!-- end /.col-md-5 -->

                <div class="col-lg-7">
                    <div class="chat_area cardify">
                        <div class="chat_area--title">
                            <h3>Message with
                                <span class="name">Codepoet</span>
                            </h3>
                            <div class="message_toolbar">
                                <a href="message.html#">
                                    <span class="lnr lnr-flag"></span>
                                </a>
                                <a href="message.html#">
                                    <span class="lnr lnr-trash"></span>
                                </a>
                                <a href="message.html#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img src="images/menu_icon.png" class="dropdown-trigger" alt="Menu icon">
                                </a>

                                <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop1">
                                    <li>
                                        <a href="message.html#">Mark as unread</a>
                                    </li>
                                    <li>
                                        <a href="message.html#">Dropdown link</a>
                                    </li>
                                    <li>
                                        <a href="message.html#">All Attachments</a>
                                    </li>
                                </ul>
                                <!-- end /.dropdown -->
                            </div>
                            <!-- end /.message_toolbar -->
                        </div>
                        <!-- end /.chat_area--title -->

                        <div class="chat_area--conversation" id="conv">
                            
                            <!-- end /.conversation -->

                           
                            <!-- end /.conversation -->

                        </div>
                        <!-- end /.chat_area--conversation -->

                        <div class="message_composer">
                            <div class="composer_field" id="trumbowyg-demo"></div>
                            <!-- end /.trumbowyg-demo -->

                            <div class="attached"></div>

                            <div class="btns">
                                <button class="btn send btn--sm btn--round">Reply</button>
                                <label for="att">
                                    <input type="file" class="attachment_field" id="att" multiple>
                                    <span class="lnr lnr-paperclip"></span>Attachment</label>
                            </div>
                            <!-- end /.message_composer -->
                        </div>
                        <!-- end /.message_composer -->
                    </div>
                    <!-- end /.chat_area -->
                </div>
                <!-- end /.col-md-7 -->
            </div>
            <!-- end /.row -->
        </div>
    </section>
    <!--================================
            END MESSAGE AREA
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
    $('#mymess').load('mess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#messcount').load('countmess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#myboss').load('countmess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#minibox').load('mesbox.php?uid=<?php echo $_SESSION['id'];?>');



    setInterval(() => {
    $('#mymess').load('mess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#messcount').load('countmess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#myboss').load('countmess.php?uid=<?php echo $_SESSION['id'];?>');
    $('#minibox').load('mesbox.php?uid=<?php echo $_SESSION['id'];?>');




        
    }, 10000);



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


            




            $(document).on("submit",".inboxfrm",function(e){


            e.preventDefault();

            var composeopt = {
                url: 'inbox.php?uid=<?php echo $_SESSION['id'];?>',
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                // beforeSend: isLoading,
                success: function(repo){
                   

                    $('#conv').html(repo);
                    $(".conversation").fadeIn();


                }


            }
$.ajax(composeopt);

})
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