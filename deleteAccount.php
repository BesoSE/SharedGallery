<?php 
    include 'includes/auto-load.inc.php';

?>

<?php
   if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

$sg=new SharedGallery();
$Id=isset($_GET['id']) ? $_GET['id'] :null;

if($Id){
   
        
       
        $sg->deleteAccount($Id);
    
    
}
?>