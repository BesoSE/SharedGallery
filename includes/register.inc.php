<?php 
    include 'auto-load.inc.php';

?>

<?php 
    $sg=new SharedGallery();
    if(isset($_POST['submit'])){
        $data['username']=$_POST['uname'];
        $data['email']=$_POST['email'];
        $data['password']=$_POST['pwd'];
        $data['repeat']=$_POST['pwd2'];
   

  

    $errorUsername=false;
    $errorPassword=false;
    $errorPWD=false;
    $errorUname=false;
    $errorEmail=false;



    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        echo '<span>Enter the correct email</span>';
        $errorEmail=true;
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$data['username'])){
        echo '<span>Enter the correct username</span>';
        $errorUname=true;
    }else if(strlen($data['password'])<8){
        echo '<span>The password must have a minimum of 8 characters</span>';
        $errorPassword=true;
    }
    
    else if($data['password']!==$data['repeat']){
        echo '<span>Wrong password</span>';
        $errorPWD=true;
    }else{
        $resultUsername=$sg->checkUsername($data['username']);
        $resultEmail=$sg->checkEmail($data['email']);
     
        
        if($resultUsername==NULL && $resultEmail==NULL){

            $sg->registerUser($data);
            
            
           $user_id=$sg->getLastUserId();
           $ud=json_encode($user_id->{"id"},JSON_NUMERIC_CHECK);
            $sg->setUsersRoles($ud,"1");
           echo '<span>Successfully registration</span>';
           
           
           

        }else if($resultUsername!=NULL){
            echo '<span>Username is used</span>';
            $errorUsername=true;
        }else if($resultEmail!=NULL){
            echo '<span>Email is used</span>';
            $errorEmail=true; 
        }
    

    }

}else{
        echo '<span>Error</span>';
    }

    ?>


<script>
    
     
      
        var errorEmail="<?php echo $errorEmail ?>";
        var errorUsername="<?php echo $errorUsername; ?>";
        var errorUname="<?php echo $errorUname; ?>";
        var errorPassword="<?php echo $errorPassword; ?>";
        var errorPWD="<?php echo $errorPWD; ?>";
     
      if(errorEmail==true){
      
        $("#password,#repeatpassword,#email").val("");
        $("#Message").addClass("alert alert-danger");

       }else if(errorUname==true){
        $("#username,#password,#repeatpassword").val("");
        $("#Message").addClass("alert alert-danger");
        
       }else if(errorPWD==true){
       
        $("#password,#repeatpassword").val("");
        $("#Message").addClass("alert alert-danger");

       }else if(errorUsername==true){
        $("#username,#password,#repeatpassword").val("");
        $("#Message").addClass("alert alert-danger");
        
       }else if(errorPassword==true){
       
        $("#password,#repeatpassword").val("");
        $("#Message").addClass("alert alert-danger");

       }




       if(errorEmail==false && errorUsername==false && errorUname==false && errorPWD==false && errorPassword==false){
        $("#username,#email,#password,#repeatpassword").val("");
        $("#Message").removeClass();
        $("#Message").addClass("alert alert-success");
       }



    </script>

     