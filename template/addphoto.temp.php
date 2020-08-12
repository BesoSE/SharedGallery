<?php 
   include 'header.temp.php';
   ?>



<div class="ful" style=" 
    height: 100%;
    background-image: url('https://www.burchcom.com/wp-content/uploads/2019/01/images1997-5c2f99436aa28-1024x683.jpg');
    background-size: cover;"
    
    >
    <div class="container" style="display:flex; justify-content:center; height:100%;">
    <div class="row">
<h1 style="margin-top:20%;">Shared your photos with us</h1>

    <div   style="display:flex; align-items:center; justify-content:start; border:1px solid black; border-radius:5px; padding:2%; ">
    <form action="includes/upload.inc.php" method="POST" enctype="multipart/form-data" >
    
    <input type="file" name="images[]" id="images" class="btn btn-primary" required multiple   >
    <br>
   
    <input type="submit" name="submitUpload" value="Upload" class="btn btn-success">
    </form>
    </div>

	<!--  message  -->
    <div >
    <?php if(displayMessage()!=NULL) :?>
					<div class="alert alert-danger" id="Message"><?php displayMessage(); ?></div>
    <?php endif; ?>
				</div>

                </div>
                </div>
                </div>

   <?php 
    include 'footer.temp.php';
   ?>