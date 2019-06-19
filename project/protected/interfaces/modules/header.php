<?php if(IsUserLoggedIn()) :?>
<?php
 echo '<div id="headerdiv"><div id="upper">nyílvántartás</div><br>';
 echo '<h2>Személyek-Járművek</h2></div>';
?>
<?php else:?>
<div id="headerdiv">
<div id="upper">nyílvántartás</div><br>
<h2>Személyek-Járművek</h2>
</div>
<?php endif;?>