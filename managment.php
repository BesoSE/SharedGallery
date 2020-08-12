<?php 
    include 'includes/auto-load.inc.php';

?>

<?php
   if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
    $sg=new SharedGallery();
    $template=new Template('template/managment.temp.php');
    $template->data=$sg->getDataAndImg();


 
    echo $template;
   

?>