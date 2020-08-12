<?php 
    include 'includes/auto-load.inc.php';

?>
<?php

    $template=new Template('template/register.temp.php');
   

    echo $template;
    if(isset($_SESSION['id'])){
        header("Location: index.php");
    }

?>