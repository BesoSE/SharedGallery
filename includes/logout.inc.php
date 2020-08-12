<?php 
  if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
}
session_start();
session_unset();
session_destroy();

header('Location: ../index.php');



?>