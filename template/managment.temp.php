<?php 
   include 'header.temp.php';
   ?>
   
    <div class="container" style="margin-top:2%;">
 <!--  message  -->
 <div >
    <?php if(displayMessage()!=NULL) :?>
					<div class="alert alert-success" id="Message"><?php displayMessage(); ?></div>
    <?php endif; ?>
				</div>
 
  <form action="addphoto.php">
  <input type="submit" class="btn btn-primary" value="Add photo" >
  </form>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Data</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
 <?php $i=1;
  foreach($data as $show): ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td>
        <h5>Username: <?php echo $show->username; ?></h5>
        <h6>Email: <?php echo $show->email; ?></h6>
      </td>
      <td> <img src="<?php echo $show->imageUrl; ?>" style="width:200px; height:150px;" alt="" > </td>
      <td>
      <?php if($_SESSION['id']==$show->id): ?>
        
  <button type="submit" class="btn btn-danger deleteImg"  data-id="<?php echo $show->idimg; ?>"  >Remove</button>
  
      <?php endif; ?>
      </td>
    </tr>
 <?php endforeach; ?>
    </tbody>
    </table>

    </div>
   <?php 
    include 'footer.temp.php';
   ?>


   
<script>
$(function () {
$(".deleteImg").click(function (event){
    event.preventDefault();
    const id=$(this).attr("data-id");
  
    if(confirm('Delete image?')){
     
     
    
     fetch(`deletePhoto.php?id=${id}`,{
         method:"DELETE"
     }).then(res=>window.location.reload());

     alert('Image deleted');
    }
 });

});
</script>