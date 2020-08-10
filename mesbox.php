<?php
include 'db.php';

$id = $_GET['uid'];



$nn =  mysqli_query($conn,"SELECT * FROM  messages WHERE receiver='$id'  ORDER BY id DESC  LIMIT 15");

function timeago($timing)
            {
                $timestamp= $timing;
                $timelist = array("second","minute","hour","day","week","month","year");
                $lengh =array("60","60","24","7","4","12","10");
                $currenttime = time();

                if ($currenttime>$timestamp) {

                    $diff = time()-$timestamp;
                    for ($i=0; $diff >= $lengh[$i] && $i < count($lengh)-1 ; $i++) { 

                        $diff = $diff/$lengh[$i];

                        # code...
                    }
                    $diff = round($diff);
                    return $diff  ." ".$timelist[$i] . " (s) ago";

                    # code...
                }
                elseif ($currenttime=$timestamp) {
                    return "Just Now'";
                }
            }

while ($rnot= mysqli_fetch_array($nn)) {
    $sid = $rnot['sender'];
    $message =$rnot['message'];
    $status=$rnot['status'];
  
    $getuser = mysqli_query($conn,"SELECT * FROM users WHERE id='$sid'");
    $messid= $rnot['id'];
    $rsend = mysqli_fetch_array($getuser);
    
    $sendername= $rsend['username'];
    if($sid == $id){
        $sendername = "you";
        // echo $sendername;
    }
    
    $timing =$rnot['timing'];




    

    $mytime= timeago($timing);
    // $txt = strip_tags($txt);
    if (strlen($sendername) > 16) {

        // truncate string
        $stringCut = substr($sendername, 0, 16);
        $endPoint = strrpos($stringCut, ' ');
    
        //if the string doesn't contain any space then it will cut without word basis.
        $sendername = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $sendername = $sendername.'.';
        
    }



    if (strlen($message) > 21) {

        // truncate string
        $stringCut = substr($message, 0, 16);
        $endPoint = strrpos($stringCut, ' ');
    
        //if the string doesn't contain any space then it will cut without word basis.
        $message = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $message = $message.'...';
        
    }
    $hispic= $rsend['pimage'];
    $hisgender =$rsend['gender'];

    if(empty($hispic)){

        $hispic= $hisgender.'.png';
    }

    
    if($status=="unread"){

        echo '
        <form class="inboxfrm">
        <input type="hidden" name="hisid" value="'.$sid.'">
        <input type="hidden" name="messid" value="'.$messid.'">

            <div class="message active">
        <div class="message__actions_avatar">
            <div class="actions">
                <span class="fa fa-star-o"></span>
                <div class="custom_checkbox">
                    <input type="checkbox" id="ch2">
                    <label for="ch2">
                        <span class="shadow_checkbox"></span>
                    </label>
                </div>
            </div>
            

            <div class="avatar">
                <img src="profile/'.$hispic.'" alt="">
            </div>
        </div>
        <button style="border-style:none;background-color:transparent!important;">
        <div class="message_data">
            <div class="name_time">
                <div class="name">
                    <p>'.$sendername.'</p>
                    <span class="lnr lnr-envelope"></span>
                </div>

                <span class="time">'.$mytime.'</span>
                <p>'.$message.'</p>
            </div>
        </div>
        </button>
    </div></form> ';
    }
    else {
        echo '<form class="inboxfrm">  
        <input type="hidden" name="hisid" value="'.$sid.'">
        <input type="hidden" name="messid" value="'.$messid.'">

        
       <div class="message">
          
        <div class="message__actions_avatar">
            <div class="actions">
                <span class="fa fa-star-o"></span>
                <div class="custom_checkbox">
                    <input type="checkbox" id="ch3">
                    <label for="ch3">
                        <span class="shadow_checkbox"></span>
                    </label>
                </div>
            </div>

            <div class="avatar">
                <img src="profile/'.$hispic.'" alt="">
            </div>
        </div>
        <!-- end /.actions -->
        <button style="border-style:none;background-color:transparent!important;">
        <div class="message_data">
            <div class="name_time">
                <div class="name">
                    <p>'.$sendername.'</p>
                </div>

                <span class="time">'.$mytime.'</span>
                <p>'.$message.'</p>
            </div>
        </div>
        </button>
        <!-- end /.message_data -->
    </div></form>';
    }
    # code...
}



?>