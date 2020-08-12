<?php 
    include 'auto-load.inc.php';

?>

<?php 
    $sg=new SharedGallery();
    if(isset($_POST['submit'])){
        $data['username']=$_POST['uname'];
 
        $data['password']=$_POST['pwd'];
        $data['remember']=$_POST['remember'];
       
        $errorUsername=false;
        $errorPassword=false;

        

        if( $sg->checkUsername($data['username'])!=NULL){
            $pwd=$sg->checkPassword($data['username']);
            $pwdCheck=password_verify($data['password'],$pwd->password);
            
            if($pwdCheck==true){
                echo "<span>Successfully login</span>";
                
                if($data['remember']==1){
                 
                     setcookie("username",$data['username'],time()+(10*365*24*60*60),"/");
                    setcookie("password",$data['password'],time()+(10*365*24*60*60),"/");
                   
                }else{

                    
                    if(isset($_COOKIE['username'])){
                        unset($_COOKIE['username']); 
                            setcookie('username', null, -1, '/'); 
                    }
                    if(isset($_COOKIE['password'])){
                        unset($_COOKIE['password']); 
                            setcookie('password', null, -1, '/'); 
                    }

                }
                $_SESSION['id']=$pwd->id;
               


            }else{
                echo "<span>Enter the correct password</span>";
                $errorPassword=true;
            }
        }else{
            echo "<span>Enter the correct username</span>";
            $errorUsername=true;
        }
  

  

}else{
        echo '<span>Error</span>';
    }

    ?>


<script>
    
     
      
        
        var errorUsername="<?php echo $errorUsername; ?>";
        
        var errorPassword="<?php echo $errorPassword; ?>";
       
     
     if(errorUsername==true){
        $("#username,#password,#remember").val("");
        $("#Message").addClass("alert alert-danger");
        
       }else if(errorPassword==true){
       
        $("#password,#remember").val("");
        $("#Message").addClass("alert alert-danger");

       }




       if( errorUsername==false && errorPassword==false){
       
        $("#Message").removeClass();
        $("#Message").addClass("alert alert-success");
        location.reload();
       }



    </script>

     