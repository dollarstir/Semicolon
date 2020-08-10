<?php
include "db.php";
$prodid = $_GET['prodid'];
$myid= $_GET['uid'];
$getmy = mysqli_query($conn,"SELECT * FROM users WHERE id='$myid'");
    $rmy = mysqli_fetch_array($getmy);
    $pmy = $rmy['pimage'];
    
    
    if(empty($pmy)){
        $pmy = "profile/".$rmy['gender'].".png";
    }
    else{
        $pmy = "profile/".$pmy;

    }



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


$loadc= mysqli_query($conn,"SELECT * FROM comments WHERE prodid='$prodid'");
while ($row = mysqli_fetch_array($loadc)) {
    $comid =$row['id'];
    $uid = $row['cid'];
    $timing = $row['timing'];
    $mytime= timeago($timing);


    $getrep =mysqli_query($conn,"SELECT * FROM replies WHERE comid='$comid'")  ;
    $rco= mysqli_fetch_array($getrep);
    $rep = mysqli_num_rows($getrep);

    $getu = mysqli_query($conn,"SELECT * FROM users WHERE id='$uid'");
    $ruser = mysqli_fetch_array($getu);
    $pic = $ruser['pimage'];
    
    $type =' <span class="comment-tag buyer">Customer</span>';
    if(empty($pic)){
        $pic = "profile/".$ruser['gender'].".png";
    }
    else{
        $pic = "profile/".$pic;

    }

    $user= $ruser['id'];

    if($user == $myid){

        
        $type ='<span class="comment-tag author">Author</span>';

    }
    
    if($rep >=1){

                echo '<li class="single-thread">
        <div class="media">
            <div class="media-left">
                <a href="single-product.html#">
                    <img class="media-object" src="'.$pic.'" alt="Commentator Avatar" style="height:70px;width:70px;border-radius:100px;">
                </a>
            </div>
            <div class="media-body">
                <div>
                    <div class="media-heading">
                        <a href="author.html">
                            <h4>'.$ruser['username'].'</h4>
                        </a>
                        <span>'.$mytime.'</span>
                    </div>
                    '.$type.'
                    <a href="product/'.$prodid.'#'.$comid.'" class="reply-link">Reply</a>
                </div>
                <p>'.$row['comment'].' </p>
            </div>
        </div>

        <!-- nested comment markup -->
        <ul class="children">';
        $getrep1 =mysqli_query($conn,"SELECT * FROM replies WHERE comid='$comid'")  ;

        while ($rp= mysqli_fetch_array($getrep1 )) {
            $ud =$rp['uid'];
            $rid=$rp['id'];
            $timing1 =$rp['timing'];
            $mytime1= timeago($timing1);


            $getu1 = mysqli_query($conn,"SELECT * FROM users WHERE id='$ud'");
            $ruser1 = mysqli_fetch_array($getu1);
            $user1 = $ruser1['id'];

            $pic1 = $ruser1['pimage'];
    
            
            if(empty($pic1)){
                $pic1 = "profile/".$ruser1['gender'].".png";
            }
            else{
                $pic1 = "profile/".$pic1;

            }


            $type1 =' <span class="comment-tag buyer">Customer</span>';

            if($user1 == $myid){

        
                $type1 ='<span class="comment-tag author">Author</span> <button class="comment-tag author delme" style="background-color:red;" value="'.$rid.'">Delete</button>';
        
            }

            echo'<li class="single-thread depth-2">
            <div class="media">
                <div class="media-left">
                    <a href="single-product.html#">
                        <img class="media-object" src="'.$pic1.'" alt="Commentator Avatar" style="height:50px;width:50px;border-radius:100px;">
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h4>'.$ruser1['username'].'</h4>
                        <span>'.$mytime1.'</span>
                    </div>
                    '.$type1.'
                    <p>'.$rp['reply'].' </p>
                </div>
            </div>

        </li>';


            # code...
        }
            
            
       echo' </ul>

        <!-- comment reply -->
        <div class="media depth-2 reply-comment" id="'.$comid.'">
            <div class="media-left">
                <a href="single-product.html#">
                    <img class="media-object" src="'.$pmy.'" alt="Commentator Avatar" style="height:50px;width:50px;border-radius:100px;">
                </a>
            </div>
            <div class="media-body">
                <form action="#" class="comment-reply-form myreply">
                <input type="hidden" name="comid" value="'.$comid.'">
                <input type="hidden" name="myid" value="'.$myid.'">

                    <textarea class="bla" name="reply" placeholder="Write your comment..."></textarea>
                    <button class="btn btn--md btn--round">Post reply</button>
                </form>
            </div>
        </div>
        <!-- comment reply -->
        </li>';

    }
    else {
        echo '  <li class="single-thread">
        <div class="media">
            <div class="media-left">
                <a href="single-product.html#">
                    <img class="media-object" src="'.$pic.'" alt="Commentator Avatar" style="height:70px;width:70px;border-radius:100px;">
                </a>
            </div>
            <div class="media-body">
                <div>
                    <div class="media-heading">
                        <a href="author.html">
                            <h4>'.$ruser['username'].'</h4>
                        </a>
                        <span>'.$mytime.'</span>
                    </div>
                    <a href="product/'.$prodid.'#'.$comid.'" class="reply-link">Reply</a>
                </div>
                <p>'.$row['comment'].' </p>
            </div>
        </div>

        <!-- comment reply -->
        <div class="media depth-2 reply-comment" id="'.$comid.'">
            <div class="media-left">
                <a href="single-product.html#">
                    <img class="media-object" src="'.$pmy.'" alt="Commentator Avatar" style="height:50px;width:50px;border-radius:100px;">
                </a>
            </div>
            <div class="media-body">

                
                <form action="#" class="comment-reply-form myreply1">
                <input type="hidden" name="comid" value="'.$comid.'">
                <input type="hidden" name="myid" value="'.$myid.'">
                    <textarea name="reply" placeholder="Write your comment..."></textarea>
                    <button class="btn btn--sm btn--round">Post reply</button>
                </form>
            </div>
        </div>
        <!-- comment reply -->
    </li>';
    }
}






