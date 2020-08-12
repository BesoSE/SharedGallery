<?php 
   include 'header.temp.php';
   ?>

  <script>
      $(document).ready(()=>{
            $("#PwdForm").submit((event)=>{
                event.preventDefault();
                var pwd1=$("#oldpassword").val();
                var pwd2=$("#newpassword").val();
                var pwd3=$("#verifypassword").val();
          
                var submit=$("#submitPwd").val();

                $.post('includes/myaccount.inc.php',{
                    pwd1: pwd1,
                    pwd2: pwd2,
                    pwd3: pwd3,
                   
                    submit: submit
                },(data,status)=>{
                  $('#Message').html(data);

                });

            });
        });
  </script>




<div class="container"  style="margin-top:2%;">
	<!--  message  -->
  <div >
					<div class="" id="Message"></div>
				</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Username</th>
      <th scope="col"> <?php echo $user->username ?> </th>
      
    </tr>
  </thead>
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Email</th>
      <th scope="col"> <?php  echo $user->email ?> </th>
      
    </tr>
  </thead>

    </table>
    <div class = "row">
			<div class = "col-md-6 col-md-offset-3">
        <h3>Change Password</h3>
      <form action="" method="POST" id="PwdForm">
      <div class="form-group">
      <label for="oldpassword">Current Password</label>
      <input type="password" name="oldpassword" id="oldpassword" class="form-control"  required autofocus="autofocus" />
      </div>
      <br>
      <div class="form-group">
      <label for="newpassword">New Password</label>
      <input type="password" name="newpassword" id="newpassword" class="form-control"  required autofocus="autofocus" />
      </div>
      <div class="form-group">
      <label for="verifypassword">Verify Password</label>
      <input type="password" name="verifypassword" id="verifypassword" class="form-control"  required autofocus="autofocus" />
      </div>
      <div class="form-group">
      
      <input type="submit" class="btn btn-success" value="Save changes" id="submitPwd" name="submitPwd" >
      </div>
      </form>

      </div>
      </div>
      <button type="submit" class="btn btn-danger deleteAccount"  data-id="<?php echo $user->id; ?>"  >Remove Account</button>
  </div>

  
   <?php 
    include 'footer.temp.php';
   ?>


      
<script>
$(function () {
$(".deleteAccount").click(function (event){
    event.preventDefault();
    const id=$(this).attr("data-id");
  
    if(confirm('Delete Account?')){
     
     
    
     fetch(`deleteAccount.php?id=${id}`,{
         method:"DELETE"
     }).then(res=>window.location.replace("includes/logout.inc.php"));

     alert('Account deleted');
     
    }
 });

});
</script>