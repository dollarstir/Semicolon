<?php
include 'db.php';

$id = $_GET['uid'];



$nn =  mysqli_query($conn,"SELECT * FROM  notification WHERE madeto='$id' AND status='unread' ORDER BY id DESC  LIMIT 3");

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
    $name = $rnot['madename'];
    $madeby =$rnot['madeby'];
    if($madeby==$id){
        $name = "You";
    }
    $timing =$rnot['timing'];




    

            $mytime= timeago($timing);
    // $txt = strip_tags($txt);
    if (strlen($name) > 16) {

        // truncate string
        $stringCut = substr($name, 0, 16);
        $endPoint = strrpos($stringCut, ' ');
    
        //if the string doesn't contain any space then it will cut without word basis.
        $name = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $name = $name.'.';
        
    }
    $hispic= $rnot['madepic'];
    $hisgender =$rnot['madegend'];

    if(empty($hispic)){

        $hispic= $hisgender.'.png';
    }

    echo ' <div class="notification">
                <div class="notification__info">
                    <div class="info_avatar">
                        <img src="profile/'.$hispic.'" alt="">
                    </div>
                    <div class="info">
                        <p>
                            <span>'.$name.' </span>'.$rnot['note'].'
                            <a href="product/'.$rnot['itemlink'].'"> '.$rnot['item'].' </a>
                        </p>
                        <p class="time">'.$mytime.'</p>
                    </div>
                </div>
                <!-- end /.notifications -->

                <div class="notification__icons ">
                    <span class="btn btn-primary " style="color:#fff;">Read</span><br><br>
                    <span class="lnr lnr-cart purchased noti_icon"></span> 
                   
                </div>
                <!-- end /.notifications -->
            </div>';
    # code...
}



?>