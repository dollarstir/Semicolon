<?php


    include 'db.php';
    $mim = 19;
    $myref ="kofi";
    
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


        $datadded = date("jS F, Y");
        $tt = date("h:i A");
        $ins= mysqli_query($conn,"INSERT INTO sales(uid,prodid,price,ref,dateadded,tt,downloadlink,item,category,description,author,thumbnail) VALUES ('$mim','$prodid','$price','$myref','$datadded','$tt','$mainfile','$item','$category','$description','$author','$thumbnail')");
        
        $del= mysqli_query($conn,"DELETE FROM cart WHERE uid='$mim' AND status='incart' ");

        if($ins && $del){
            echo 'both done';
        }
        else{
            echo 'failed';
        }
        
        

    }
    


  


   




?>