<?php 
    include 'includes/auto-load.inc.php';

?>

<?php
   if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

    $template=new Template('template/addphoto.temp.php');

 
    echo $template;
   

?>