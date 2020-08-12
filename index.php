<?php 
    include 'includes/auto-load.inc.php';

?>

<?php

    $template=new Template('template/frontpage.temp.php');
    $sg=new SharedGallery();
    $template->count=$sg->getCountPhotos();
    
    echo $template;

?>