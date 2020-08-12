<?php 
    include 'auto-load.inc.php';

?>

<?php 
    
    if(isset($_POST['submit'])){
        $c=$_POST['c'];

        echo "<h2>Number of shared photos is ".$c."!</h2> <h3>Login to see all photos and share something with us</h3>";
    }
    ?>

    <script>

        $("#submitCount").css("visibility","hidden");
    </script>