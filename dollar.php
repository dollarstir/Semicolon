<?php
include 'db.php';
include 'core.php';
session_start();
 $dollar = $_GET['dollar'];
if (function_exists($dollar)) {
    $dollar();
    # code...
}
else {
    echo '<script>window.location="404.html" </script>';
}
?>