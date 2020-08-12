<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
  <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

          <link rel="stylesheet" href="css/style.css">
    <title>Shared Gallery</title>


    </head>
<body style="height:100%;">
<!-- header  -->
<nav class="navbar navbar-inverse navbar-fixed-top" >
    <div class="container">
        <div class="navbar-header">
     
            <a class="navbar-brand" href="index.php" >Home </a>
            </div>
            <?php if (!isset($_SESSION['id'])): ?>
            <a class=" btn btn-primary navbar-btn navbar-right" href="login.php">Login</a>
            <?php else: ?>
                <a class="navbar-brand navbar-right" href="myaccount.php"  style="margin-left:2%;">My Account</a>
            <a class=" btn btn-primary navbar-btn navbar-right" href="includes/logout.inc.php">Logout</a>
            
            <?php endif; ?>
           
        
    </div>
</nav>

<br>
<br>