<?php
   if(array_key_exists("new_tag", $_POST)){
       $query = "INSERT INTO users(userName,userPsswd) VALUES (\"".$_POST['userName']."\",\"".sha1($_POST['pw'])."\")";
       executeDML("CALL Log('INSERT','users',".$_SESSION['uid'].")");
       $success = executeDML($query);
       if($success){
           echo '<script>
        alert(\'Sikerült\');
    </script>';
       }
       else{
           echo '<script>
        alert(\'Hiba történt!\');
    </script>';
       }
   }

   if(array_key_exists("deleteUser", $_POST)){
       $query = "DELETE FROM users WHERE userID= ".$_POST['userID'];
       executeDML("CALL Log('DELETE','users',".$_SESSION['uid'].")");
       $success = executeDML($query);
       if($success){
           echo '<script>
        alert(\'Sikerült\');
    </script>';
       }
       else{
           echo '<script>
        alert(\'Hiba történt!\');
    </script>';
       }
   }
