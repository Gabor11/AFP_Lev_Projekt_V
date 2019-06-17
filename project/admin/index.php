<?php
    session_start();
	require_once '../protected/configs/admin_config.php';
    require_once '../protected/core/session.php';
    require_once '../protected/core/database.php';   
?>

<html>
    <head>
        <title>
          <?php echo 'Üdvözöljük '.$_SESSION['uname'].'!'?>  
        </title>  
        <link href="../styles.css" type="text/css" rel="stylesheet">
    </head>
    <div id="menu" class="menu" >
        <?php require_once M_INTERFACES.'menu.php'; ?>
    </div>
    <div id="content" class="content">
        <?php require_once M_INTERFACES.'content.php';?>
    </div>
    
</html>