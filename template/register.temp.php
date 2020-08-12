<?php 
   include 'header.temp.php';
   ?>
<script>
        $(document).ready(()=>{
            $("#registerForm").submit((event)=>{
                event.preventDefault();
                ;
                var username=$("#username").val();
                var email=$("#email").val();
             
                var pwd=$("#password").val();
                var pwd2=$("#repeatpassword").val();
                var submit=$("#submitRegister").val();

                $.post('includes/register.inc.php',{
                    uname:username,
                    email: email,
                    pwd: pwd,
                    pwd2: pwd2,
                    submit: submit
                },(data,status)=>{
                  $('#Message').html(data);

                });

            });
        });
    </script>

	<div class="container">

    <div>
						<p  id="Message"></p>
					</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3">

			
				<h1>Registration</h1>

				<form action="register.inc.php" method="post" id="registerForm">
					<div class="form-group">
						<label class="control-label" for="username"> Username </label>
						<input id="username" class="form-control"  name="username"
							required autofocus="autofocus" />
					</div>


					<div class="form-group">
						<label class="control-label" for="email"> Email </label> <input
							id="email" class="form-control" name="email"  required
							autofocus="autofocus" />
					</div>

					<div class="form-group">
						<label class="control-label" for="password"> Password </label> <input
							id="password" class="form-control" type="password" nmae="password"
						 required autofocus="autofocus" />
					</div>
                    <div class="form-group">
						<label class="control-label" for="repeatpassword">Repeat Password </label> <input
							id="repeatpassword" class="form-control" type="password" name="repeat"
						 required autofocus="autofocus" />
					</div>

					<div class="form-group">
						<button type="submit" id="submitRegister" name="register" class="btn btn-success">Register</button>
						<span>Already registered? <a href="login.php" >Login
								here</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
  


   <?php 
    include 'footer.temp.php';
   ?>