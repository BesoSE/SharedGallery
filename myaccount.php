<?php 
    include 'includes/auto-load.inc.php';

?>

<?php
   if(!isset($_SESSION['id'])){
    header("Location: index.php");
}   

    $sg=new SharedGallery();
    $template=new Template('template/myaccount.temp.php');
    $template->user=$sg->getUserById($_SESSION['id']);
    
 
    echo $template;

?>