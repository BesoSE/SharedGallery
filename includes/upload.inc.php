<?php 
    include 'auto-load.inc.php';

?>

<?php 
if(isset($_POST['submitUpload'])){
    $success=false;
    foreach($_FILES['images']['tmp_name'] as $key => $image){

    
    $fileName=$_FILES['images']['name'][$key];
    $fileTmpName=$_FILES['images']['tmp_name'][$key];
    $fileError=$_FILES['images']['error'][$key];
    $fileSize=$_FILES['images']['size'][$key];

    $fileExt=explode('.',$fileName);

    $fileActualExt = strtolower(end($fileExt));

    $allowed=['jpg','jpeg','png'];

    if(in_array($fileActualExt,$allowed)){

        if($fileError === 0){

            if($fileSize<1000000){

                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination='../upload/'.$fileNameNew;

                move_uploaded_file($fileTmpName,$fileDestination);
                

                $img='upload/'.$fileNameNew;

                $sg=new SharedGallery();

                $sg->uploadImages($img,$_SESSION['id']);
                
                $success=true;
                
            }else{
                redirect('../addphoto.php','Size problem','error');
                $success=false;
            }

        }else{
            
                redirect('../addphoto.php','Error','error');
                $success=false;
        }


    }else{
        redirect('../addphoto.php','Only upload jpg,jpeg and png','error');
        $success=false;
     
        
    }

        
    
    }
    if($success==true){
    redirect('../managment.php','Successfully uploaded','error');
    }

}else{
    
        redirect('../addphoto.php','Error','error');
}
?>

