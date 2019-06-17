<?php
    session_start();
	require_once '../protected/configs/admin_config.php';
    
?>

<html>
    <head>
        <title>
          <?php echo 'Üdvözöljük '.$_SESSION['uname'].'!'?>  
        </title>  
        <link href="../styles.css" type="text/css" rel="stylesheet">
    </head>

    
</html>