<?php 
    include 'auto-load.inc.php';

?>

<?php 
    $sg=new SharedGallery();
    if(isset($_POST['submit'])){
        
 
        $data['pwd1']=$_POST['pwd1'];
        $data['pwd2']=$_POST['pwd2'];
        $data['pwd3']=$_POST['pwd3'];
       
        
        $errorPwd1=false;
        $errorPwd2=false;
        $errorPwd3=false;
        

        
            $pwd=$sg->checkPassword($_SESSION['id']);
            $pwdCheck=password_verify($data['pwd1'],$pwd->password);
            
            if($pwdCheck==true){
                
                if(strlen($data['pwd2'])<8){
                    echo "<span>the password must have a minimum of 8 characters</span>";
                    $errorPwd2=true;
                }else{
                    if($data['pwd2']===$data['pwd3']){
    
                        echo "<span>You have successfully changed the password</span>";
    
                        
                        $sg->newPassword($_SESSION['id'],$data['pwd2']);
                       
    
                    }else{
                        echo "<span>Enter the correct password</span>";
                        $errorPwd3=true;
                    }
                }
      
               
               


            }else{
                echo "<span>Enter the correct password</span>";
                $errorPwd1=true;
            }
          

  

}else{
        echo '<span>Error</span>';
    }

    ?>


<script>
    
     
      
        
        var errorPwd1="<?php echo $errorPwd1; ?>";
        
        var errorPwd2="<?php echo $errorPwd2; ?>";
        var errorPwd3="<?php echo $errorPwd3; ?>";
     
     if(errorPwd1==true || errorPwd2==true || errorPwd3==true){
        $("#oldpassword,#newpassword,#verifypassword").val("");
        $("#Message").addClass("alert alert-danger");
        
       }else{
        $("#Message").removeClass();
        $("#Message").addClass("alert alert-success");
        
        location.reload();
        alert("The password has changed");
       }








    </script>

     