<?php
if(array_key_exists('updateMy', $_POST)){
    $query = "UPDATE irldatas SET name = \"".$_POST['name']."\" ,age= \"".$_POST['age']."\" ,address=\"".$_POST['address']."\" WHERE userID = ".$_SESSION['uid'];
    executeDML("CALL Log('UPDATE','irldatas',".$_SESSION['uid'].")");
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

if(array_key_exists('updateHouse', $_POST)){
    $query = "UPDATE houses SET size = ".$_POST['size']." WHERE idHouse=".$_POST['id_house'];
    executeDML("CALL Log('UPDATE','houses',".$_SESSION['uid'].")");
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

if(array_key_exists('updateCar', $_POST)){
    $query = "UPDATE cars SET idCars = \"".$_POST['idCar']."\", color =\"".$_POST['color']."\", brand=\"".$_POST['brand']."\" WHERE idCars=\"".$_POST['id_Car']."\"";
    executeDML("CALL Log('UPDATE','cars',".$_SESSION['uid'].")");
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

if(array_key_exists('updateBike', $_POST)){
    $query = "UPDATE motorcycles SET idMotorC = \"".$_POST['idBike']."\" ,color =\"".$_POST['color']."\" , type=\"".$_POST['type']."\" , brand=\"".$_POST['brand']."\" WHERE idMotorC=\"".$_POST['id_Bike']."\"";
    executeDML("CALL Log('UPDATE','motorcycles',".$_SESSION['uid'].")");
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

