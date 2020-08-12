<?php 
   include 'header.temp.php';
   ?>
   <div class="ful" style=" 
    height: 100%;
    background-image: url('https://www.burchcom.com/wp-content/uploads/2019/01/images1997-5c2f99436aa28-1024x683.jpg');
    background-size: cover;"
    
    >
<div class="container"  style="display:flex; align-items:center; justify-content:center; height:100%;">
<div class="row">
   <h1 style="text-align:center;">Shared Gallery</h1>
      <h1>Do you want to know how many photos are shared on our platform?</h1>

      <div  style="display:flex; align-items:center; justify-content:center;">
   
      <form action="" class="Count">
      <input type="submit" id="submitCount" value="See number of shared photos" class="btn btn-success ">
      </form>
      <!--  message  -->
   <div >
					<div class="" id="Message"></div>
            </div>
            </div>
            <div  style="display:flex; align-items:center; justify-content:center;">
    
            <div class="row">
  <?php if(isset($_SESSION['id'])): ?>
   <h2>See our Gallery  </h2>
  <form action="managment.php">
   <input type="submit" class="btn btn-dark form-control" value="Gallery">
  </form>
  </div>
  <?php endif; ?>

  </div>
  </div>
  </div>

  </div>
   <?php 
    include 'footer.temp.php';
   ?>


   <script>

   $(document).ready(()=>{
            $(".Count").submit((event)=>{
                event.preventDefault();
             
                var submit=$("#submitCount").val();
                  var c="<?php echo $count->c ?>";

                $.post('includes/ajax.inc.php',{
                    
                  
                    c:c,
                    submit: submit
                },(data,status)=>{
                  $('#Message').html(data);

                });

            });
        });
   </script>