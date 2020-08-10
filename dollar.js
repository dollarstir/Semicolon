$(function(){
    // $('#closethumb').css('cursor','pointer');

    $("#cnum").hide();
    $("#cy").hide();
    $("#cvc").hide();
    $("#cmo").hide();
    $("#monum").hide();
    $("#monam").hide();
    $("#expa").hide();
    $("#paymail").hide();
    $("#bmess").hide();

    
    // var opp = document.getElementById("opt1").checked = false;


    $("#opt1").change(function(){
        $("#cnum").show();
        $("#cy").show();
        $("#cvc").show();
        $("#cmo").show();
        $("#expa").show();
        $("#monum").hide();
        $("#monam").hide();
         $("#paymail").hide();



    }) 




    $(".mymtt").change(function(){
        var  dd = $(this).attr("id");
       

        var getcard = {
            url: 'dollar.php?dollar=handlecard',
            type: 'post',
            data: { theid: dd },
            
            // beforeSend: isLoading,
            success: function(mm){
                $("#mychoice").html(mm);
            }


        }
        $.ajax(getcard);





        
        if($(this).val()=="mastercard" ||  $(this).val()=="visacard"){

            $("#cnum").show();
        $("#cy").show();
        $("#cvc").show();
        $("#cmo").show();
        $("#expa").show();
        $("#monum").hide();
        $("#monam").hide();
         $("#paymail").hide();
           
        }

        else if($(this).val()=="Mobilemoney"){

            $("#cnum").hide();
            $("#cy").hide();
            $("#cvc").hide();
            $("#cmo").hide();
            $("#monum").show();
            $("#monam").show();
            $("#expa").hide();
            $("#paymail").hide();

        }
        else if($(this).val()=="paypal"){

            $("#cnum").hide();
            $("#cy").hide();
            $("#cvc").hide();
            $("#cmo").hide();
            $("#monum").hide();
            $("#monam").hide();
            $("#expa").hide();
            // $("#paymail").hide();
                $("#paymail").show();

        }



    }) 

    $("#opt2").change(function(){
        $("#cnum").show();
        $("#cy").show();
        $("#cvc").show();
        $("#cmo").show();
        $("#expa").show();
        $("#monum").hide();
        $("#monam").hide();
        $("#paymail").hide();



    })
    
    $("#opt3").change(function(){

    $("#cnum").hide();
    $("#cy").hide();
    $("#cvc").hide();
    $("#cmo").hide();
    $("#monum").hide();
    $("#monam").hide();
    $("#expa").hide();
    // $("#paymail").hide();
        $("#paymail").show();
       



    }) 

    $("#opt5").change(function(){

     $("#cnum").hide();
    $("#cy").hide();
    $("#cvc").hide();
    $("#cmo").hide();
    $("#monum").show();
    $("#monam").show();
    $("#expa").hide();
    $("#paymail").hide();
        // $("#paymail").show();
       



    })
    
    
    $("#mypart").change(function(){
        var pay = $("#mist").val();
        
        $("#rlicense").val(pay/2);

    })

    $("#mybb").change(function(){
        var pay1 = $("#mist").val();
        $("#rlicense").val(pay1);
    })
    var bal= $("#mist").val();
    var myam =  $("#rlicense").val();

    

    $("#rlicense").keyup(function() { 
        if(Number($(this).val()) > Number($("#mist").val())){
            $(this).css("border", "1px solid #FFA07A"); 
             $("#bmess").show();

        }
        else{

            // $(this).css("background-color", "#fff"); 
            $(this).css("border", "1px"); 
            $("#bmess").hide();

            
        }
    }); 
      

    

    
   

   


    







    $('#closethumb').click(function(){
        $('#thumbnail').val('');
        $('#tmbpic').attr('src',"#");
        $('#tmbpic').css('width','0px');
       
    })

    $('#zipbtn').click(function(){
        $('#main_file').val('');
        $('#fn').html(" ");
       
    })


    $('#screenbtn').click(function(){
        $('#screenshot').val('');
        $('#screenpic').attr('src',"#");
        $('#screenpic').css('width','0px');
        screenpic
       
    })


    function isLoading(){
        swal({   
            title: "Validating!",   
            text: "<small>Please wait........</small>",
            type: "info",
            html: true 
            });
    }

    function resp(response){
        if(response=="ok"){
            swal({   
                title: "login Successful!",   
                text: "<small>Please wait</small>",
                type: "success",
                html: true 
                });

        }
        else if(response=="all"){
            swal({   
                title: "Warning!",   
                text: "<small>All fields must be filled</small>",
                type: "warning",
                html: true 
                });

        }
        else if(response=="notmatch"){
            swal({   
                title: "Warning!",   
                text: "<small>Password do not match</small>",
                type: "warning",
                html: true 
                });

        }
        else if(response=="exist"){
            swal({   
                title: "oops!",   
                text: "<small>Sorry user already in database</small>",
                type: "error",
                html: true 
                });

        }
        else if(response=="notemail"){
            swal({   
                title: "warning!",   
                text: "<small>Enter valid email address</small>",
                type: "warning",
                html: true 
                });

        }

        else if(response=="commentsuccess"){
            swal({   
                title: "success!",   
                text: "<small>comment posted</small>",
                type: "success",
                html: true 
                });

        }
        else if(response=="notphone"){
            swal({   
                title: "warning!",   
                text: "<small>Enter valid phone number</small>",
                type: "warning",
                html: true 
                });

        }

       
        else if(response=="success"){
            // setTimeout(function () { 
            //     swal({
            //         title: "Success!",   
            //         text: "<small>Registration Successfull</small>",
            //         type: "success",
            //         confirmButtonText: "OK"
            //     },
            //     function(isConfirm){
            //       if (isConfirm) {
            //         window.location= "login.php";
            //       }
            //     }); }, 1000);

            swal({
                title: "Success!",
                text: "<small>Redirecting in 3 seconds.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location = "dashboard-setting.php";
              });


            

                

        }

        else if(response=="error"){
            swal({   
                title: "oops!",   
                text: "<small>Failed to add user</small>",
                type: "error",
                html: true 
                });

        }

        else if(response=="errorlogin"){
            swal({   
                title: "oops!",   
                text: "<small>Failed to login</small>",
                type: "error",
                html: true 
                });

        }
        else if(response=="errorupdate"){
            swal({   
                title: "oops!",   
                text: "<small>Failed to update record</small>",
                type: "error",
                html: true 
                });

        }

        else if(response=="successlogin"){
            swal({
                title: "Success!",
                text: "<small>login successful.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location="dashboard-setting.php";
              });

        }

        else if(response=="successlogin1"){
            swal({
                title: "Success!",
                text: "<small>login successful.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location="index.php";
              });

        }

        else if(response=="loggedout"){
            swal({
                title: "Success!",
                text: "<small>logout successful.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }


        else if(response=="methodadded"){
            swal({
                title: "Success!",
                text: "<small>Payment method added .</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location='dashboard-withdrawal.php';
              });

        }

        else if(response=="updated"){
            swal({
                title: "Success!",
                text: "<small>updated successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="request sent"){
            swal({
                title: "Success!",
                text: "<small>Request sent.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="profilepicture"){
            swal({
                title: "Success!",
                text: "<small>profile picture updated successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="update success"){
            swal({
                title: "Success!",
                text: "<small>Product updated successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="coverpicture"){
            swal({
                title: "Success!",
                text: "<small>Cover picture updated successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="bothpics"){
            swal({
                title: "Success!",
                text: "<small>Both cover and profile  picture updated successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="prodsuccess"){
            swal({
                title: "Success!",
                text: "<small>Product added successfully.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }

        else if(response=="erroprod"){
            swal({   
                title: "oops!",   
                text: "<small>Failed to add product</small>",
                type: "error",
                html: true 
                });

        }

        else if(response=="erroprod1"){
            swal({   
                title: "oops!",   
                text: "<small>Failed to upload files try again</small>",
                type: "error",
                html: true 
                });

        }


        else if(response=="messagesent"){
            swal({
                title: "Success!",
                text: "<small>Message sent.</small>",
                type: "success",
                html:true,
                timer: 3000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }


        else if(response=="notfound"){
            swal({
                title: "Sorry!",
                text: "<small>username not correct.</small>",
                type: "error",
                html:true,
                timer: 1000,
                showConfirmButton: false
              }, function(){
                    window.location.reload();
              });

        }
        else if(response=="replied"){
            swal({   
                title: "success!",   
                text: "<small>reply sent</small>",
                type: "success",
                html: true 
                });

        }

        else if(response=="reply delected"){

            swal({   
                title: "success!",   
                text: "<small>reply deleted</small>",
                type: "success",
                html: true 
                });
        }

        else{

            swal({   
                title: "oops!",   
                text: "<small>" + response + "</small>",
                type: "error",
                html: true 
                });

        }
    }
    
    $("#reg1").submit(function(e){

        e.preventDefault();

        var reg1opt = {
            url: 'dollar.php?dollar=registeruser',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(reg1opt);

    })


    $("#logout").submit(function(e){

        e.preventDefault();

        var logoutoopt = {
            url: 'dollar.php?dollar=logout',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(logoutoopt);

    })


    $("#login").submit(function(e){

        e.preventDefault();

        var loginopt = {
            url: 'dollar.php?dollar=login',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(loginopt);

    })


    $("#setting").submit(function(e){

        e.preventDefault();

        var settingopt = {
            url: 'dollar.php?dollar=settings',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(settingopt);

    })


    $("#picture").submit(function(e){

        e.preventDefault();

        var pictureopt = {
            url: 'dollar.php?dollar=updatepic',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(pictureopt);

    })


    // Username validation
    function agsearch(response) {

       if(response=="valid"){
           $('#usi').html('<div class="alert alert-success" role="alert"><span class="alert_icon lnr lnr-checkmark-circle"></span><strong>username available</strong></div>');
       }
       else if(response=="invalid"){
           $('#usi').html('<div class="alert alert-danger" role="alert"><span class="alert_icon lnr lnr-alarm"></span><strong>username taken!</strong> </div>');
       }
       else if(response=="nothing"){
        $('#usi').html('');
       }
       else if(response=="less"){
        $('#usi').html('<div class="alert alert-danger" role="alert"><span class="alert_icon lnr lnr-alarm"></span><strong>username must be three letters or above!</strong> </div>');


       }
        
    }
    $("#user_name").keyup(function () {
        var sagentinfo = $(this).val();
        var optagentsear = {
            url: 'dollar.php?dollar=validateusername',
            type:'post',
            data: {keyword:sagentinfo},
            success: agsearch

        }
        $.ajax(optagentsear);

        
        
    });

    // adding products

    $("#prodfrm").submit(function(e){
        e.preventDefault();

        var prodopt = {
            url: 'dollar.php?dollar=addproduct',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(prodopt);

    })

    $("#updateprodfrm").submit(function(e){

        e.preventDefault();

        var upprodopt = {
            url: 'dollar.php?dollar=updateproduct',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(upprodopt);

    })

    function respcart(response){
        var myid = $("#myid").val();

       if(response=="addedtocart"){
        $('.mycart').load('mc.php?uid=' + myid);

        $('#mctotal').load('mt.php?uid=' + myid);
        $('#ccounter').load('cartc.php?uid=' + myid)


        $('#addtocart').html('<span class="lnr lnr-checkmark-circle"></span> Added To Cart')

        $('#addtocart').css('background-color',"green")

       }
       else if(response=='alreadyincart'){

        $('#addtocart').html('<span class="lnr lnr-checkmark-circle"></span> Already in Cart')
        $('#addtocart').css('background-color',"red")


       }
       else if(response=="cartdeleted"){

        $('.mycart').load('mc.php?uid=' + myid);
        // $('.mysum').load('osm.php?uid=' + myid);

        $('#mctotal').load('mt.php?uid=' + myid);
        $('#ccounter').load('cartc.php?uid=' + myid);
        $('#mcctt').load('mtc.php?uid=' + myid);
        $('#mcctt1').load('mtc.php?uid=' + myid);
        // $('#tt').load('mtc.php?uid=' + myid);


       }
       else{

        $('#addtocart').html('<span class="lnr lnr-warning"></span> login first')
        $('#addtocart').css('background-color',"red")

       }
    }



    $("#addcartfrm").submit(function(e){

        e.preventDefault();

        var addcartopt = {
            url: 'dollar.php?dollar=addtocart',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: isLoading,
            success: respcart


        }
        $.ajax(addcartopt);

    })


    $(document).on("submit",".delcartfrm",function(e){


        e.preventDefault();

        var delcartopt = {
            url: 'dollar.php?dollar=delectcart',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: isLoading,
            success: respcart


        }
        $.ajax(delcartopt);

    })

    



    $(document).on("submit",".composefrm",function(e){


        e.preventDefault();

        var composeopt = {
            url: 'dollar.php?dollar=addmessage',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(composeopt);

    })


    $(document).on("submit","#adpayfrm",function(e){


        e.preventDefault();

        var pmed = {
            url: 'dollar.php?dollar=addpaymethod',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(pmed);

    })



    $(document).on("submit",".redrawalfrm",function(e){


        e.preventDefault();

        var pmed = {
            url: 'dollar.php?dollar=redrawalls',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: isLoading,
            success: resp


        }
        $.ajax(pmed);

    })


    $(document).on("submit","#crf",function(e){


        e.preventDefault();

        var pcomopt = {
            url: 'dollar.php?dollar=postcomment',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: isLoading,   
            success: function(response){
                commit1()
                
            }


        }
        $.ajax(pcomopt);

    })


    $(document).on("submit",".myreply",function(e){


        e.preventDefault();

        var pcreppopt = {
            url: 'dollar.php?dollar=postreply',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: isLoading,
            success: function(response){
                commit1()
                
            }

        }
        $.ajax(pcreppopt);

    })

    $(document).on("submit",".myreply1",function(e){


        e.preventDefault();

        var pcreppopt = {
            url: 'dollar.php?dollar=postreply',
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: isLoading,
            success: function(response){
                commit1()
                
            }

        }
        $.ajax(pcreppopt);

    })


    function commit1(){

        var mese = $("#mesec").val();
        var mepro = $("#mepro").val();
        $.ajax({
        url: 'comments.php',
        type: 'get',
        data: {prodid:mepro,uid:mese},
        success: function(response){
        
        $('#mycomm').html(response);

       
        }
        });
    }

  
    $(document).on("click",".delme",function(e){
        
        var repp = $(this).val();
        

        e.preventDefault();

        

        var delrep = {
            url: 'dollar.php?dollar=delreply',
            type: 'post',
            data: {repid:repp},
            
            // beforeSend: isLoading,
            success: function(response){
                commit1()
                
            }


        }
        $.ajax(delrep);

    })

    
})