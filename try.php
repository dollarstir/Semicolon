<html>
    <head>
        <script type="text/javascript">
            function alertFilename()
            {
                var thefile = document.getElementById('thefile');
                alert(thefile.value);
                var sp =  document.getElementById('mypic');
                sp.attr.src= thefile.value;
            }
        </script>
    </head>
    <body>
        <form>
            <input type="file" id="thefile" onchange="alertFilename()" />
            <img src="C:\fakepath\Screenshot 2020-06-18 at 3.27.03 PM.png" alt="" style="width:100px;height:100px;" id="mypic">
            <input type="button" onclick="alertFilename()" value="alert" />
        </form>
    </body>
</html>

                           

<!DOCTYPE html>
<html>
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<meta charset=utf-8 />
<title>JS Bin</title>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
</head>
<body>
  <input type='file' onchange="readURL(this);" />
    <img id="blah" src="#" alt="your image" />
</body>
</html>