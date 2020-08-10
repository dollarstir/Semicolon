<?php
include 'db.php';

$id = $_GET['uid'];
$hisid=$_POST['hisid'];
$messid=$_POST['messid'];




$nn =  mysqli_query($conn,"SELECT * FROM  messages WHERE receiver='$id' AND id='$messid' ORDER BY id DESC  LIMIT 3");
$upmess = mysqli_query($conn,"UPDATE messages SET status='read' WHERE id='$messid'");

$getuser = mysqli_query($conn,"SELECT * FROM users WHERE id='$hisid'");
    $rsend = mysqli_fetch_array($getuser);
    $sendername= $rsend['username'];


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

$rnot= mysqli_fetch_array($nn);
    // $sid = $rnot['sender'];
    $message =$rnot['message'];
    $messref= $rnot['ref'];
  
    
    
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



    
    $hispic= $rsend['pimage'];
    $hisgender =$rsend['gender'];

    if(empty($hispic)){

        $hispic= $hisgender.'.png';
    }

    echo '  <div class="conversation">
    <div class="head">
        <div class="chat_avatar">
            <img src="profile/'.$hispic.'" alt="Notification avatar">
        </div>

        <div class="name_time">
            <div>
                <h4>'.$sendername.'</h4>
                <p>'.$mytime.'</p>
            </div>
            <span class="email">'.$sendername.'@yalldev.com</span>
        </div>
        <!-- end /.name_time -->
    </div>
    <!-- end /.head -->

    <div class="body">
        <p>'.$message.'</p>';

        $sel= mysqli_query($conn,"SELECT * FROM attachment WHERE ref ='$messref'");
        $cco = mysqli_num_rows($sel);
        

        if ($cco >=1) {
            echo'<div class="attachments">
            <div class="attachment_head">
                <p>
                    <span class="lnr lnr-paperclip"></span> '.$cco.' Attachments</p>
                <a href="upload/'.$messref.'.zip" download>
                    <span class="lnr lnr-download"></span> Download</a>
            </div>

            <div class="attachment">
                <ul>';
                while ($rat =mysqli_fetch_array($sel)) {

                    echo'<li>
                    <a href="attachment/'.$rat['doc'].'" target="blank" class="venobox">';
                    if(preg_match("/\.png$/",$rat['doc']) || preg_match("/\.jpeg$/",$rat['doc'])|| preg_match("/\.gif$/",$rat['doc']) || preg_match("/\.jpg$/",$rat['doc'])){
                        echo ' <img src="attachment/'.$rat['doc'].'" alt="image attachment" style="width:100px;height:70px;">';
                    
                    }
                    elseif (preg_match("/\.mp4$/",$rat['doc']) || preg_match("/\.3gp$/",$rat['doc'])) {
                        echo ' <img src="images/video.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }

                    elseif (preg_match("/\.mp3$/",$rat['doc']) || preg_match("/\.mu3$/",$rat['doc'])) {
                        echo ' <img src="images/aud2.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }
                    elseif (preg_match("/\.zip$/",$rat['doc']) || preg_match("/\.rar$/",$rat['doc'])) {
                        echo ' <img src="images/zip.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }

                    elseif (preg_match("/\.pdf$/",$rat['doc'])) {
                        echo ' <img src="images/pdf.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }

                    elseif (preg_match("/\.html$/",$rat['doc'])) {
                        echo ' <img src="images/html.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }

                    elseif (preg_match("/\.js$/",$rat['doc'])) {
                        echo ' <img src="images/js.png" alt="image attachment" style="width:100px;height:70px;">';
                        # code...
                    }

                    echo '</a>
                </li>';
                    # code...
                }
                    
                    
              echo '  </ul>
            </div>
        </div>';

            
            # code...
        }

        
   echo' </div>
    <!-- end /.body -->
</div>';
    # code...




?>