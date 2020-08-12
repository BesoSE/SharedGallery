<?php 
   include 'header.temp.php';
   ?>



<script>
        $(document).ready(()=>{
            $("#loginForm").submit((event)=>{
                event.preventDefault();
                
                var username=$("#username").val();
            
             
                var pwd=$("#password").val();
				if($("#remember").is(":checked")){
               var remember=1;
				}
				else{
					remember=0;
				}
                var submit=$("#submitLogin").val();

                $.post('includes/login.inc.php',{
                    uname:username,
                  
                    pwd: pwd,
                   remember:remember,
                    submit: submit
                },(data,status)=>{
                  $('#Message').html(data);

                });

            });
        });
    </script>




<div class = "container">
		<div class = "row">
			<div class = "col-md-6 col-md-offset-3">
				
				<h1>  Login Page </h1>
				<form action="" id="loginForm" method="post">
					
				
    
    	<!--  message  -->
        <div >
					<div class="" id="Message"></div>
				</div>

				
					
					<div class = "form-group">
						<label for ="username"> Username </label> 
						<input type="text" class = "form-control" id ="username" name = "username" 
						value="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];} ?>"
						placeholder="Username" required autofocus="autofocus" />
					</div>
					
					<div class="form-group">
						<label for="password">Password</label> <input type="password"
							id="password" name="password" class="form-control"
							value="<?php if(isset($_COOKIE ['password'])){echo $_COOKIE['password'];} ?>"
							placeholder="Password" required autofocus="autofocus" />
					</div>
                    <div class="form-group">
						<input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["username"])) { ?> checked <?php } ?> >
						<label for="remember">Remember me</label>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<input type="submit" name="loginsubmit" id="submitLogin"
									class="form-control btn btn-primary" value="Login" />
							</div>
						</div>
					</div>
				</form>
				<div class="form-group">
						<span>New user? <a href="register.php" >Register
								here</a></span>
				</div>
			</div>
		</div>
	</div>
  


   <?php 
    include 'footer.temp.php';
   ?>