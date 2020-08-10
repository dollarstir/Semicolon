<!doctype html>
<html>
  <head>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
   
  </head>
  <body style="width:100%;height:100vh;" oncontextmenu="false">
   <h1>hello world</h1>
   <iframe id="ff" src="" onload="onLoad()" onerror="onError()"></iframe>

    <script>
      $(function(){
          var link= 'https://logrocket.com/';
          $('#ff').attr('src',link);
        $('body').contextmenu(function(){
        alert('you just clicked right button of your mouse');
        $('#ff').attr('src',"helloword");
        return false;
        });

        function onLoad(){  
            

        }

      });
    </script>
  </body>
</html>