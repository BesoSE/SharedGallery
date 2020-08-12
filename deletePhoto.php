<?php 
    include 'includes/auto-load.inc.php';

?>

<?php
   if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

$sg=new SharedGallery();
$ImgId=isset($_GET['id']) ? $_GET['id'] :null;

if($ImgId){
    if(isset($_SESSION['id'])){
        $uid=$_SESSION['id'];
        
       
        if( $sg->deletePhoto($ImgId)){
            redirect('managment.php','Post obrisan','success');
        }else{
            redirect('managment.php','Nije moguce obrisati post','error');
        }

    }
    
}
?>