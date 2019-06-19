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

if(array_key_exists('new_house_add', $_POST)){
    $query = "INSERT INTO houses(size,owner) VALUES('".$_POST['new_house_size']."','".$_SESSION['uid']."')";
    executeDML("CALL Log('INSERT','houses',".$_SESSION['uid'].")");
    $success= executeDML($query);
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

if(array_key_exists('new_car_add', $_POST)){
    $query = "INSERT INTO cars (idCars,color,brand,owner) "
            . "VALUES('".$_POST['idCar']."','".$_POST['color']."','".$_POST['brand']."','".$_SESSION['uid']."')";    
    executeDML("CALL Log('INSERT','cars',".$_SESSION['uid'].")");
    $success= executeDML($query);
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

if(array_key_exists('new_bike_add', $_POST)){
    $query = "INSERT INTO motorcycles(idMotorC,color,type,brand,owner) "
            . "VALUES('".$_POST['idBike']."','".$_POST['color']."','".$_POST['type']."','".$_POST['brand']."','".$_SESSION['uid']."')";    
    executeDML("CALL Log('INSERT','motorcycles',".$_SESSION['uid'].")");
    $success= executeDML($query);
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

if(array_key_exists('deleteHouse', $_POST)){
    $query = "DELETE FROM houses WHERE idHouse =".$_POST['id_house'];
    executeDML("CALL Log('DELETE','houses',".$_SESSION['uid'].")");
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

if(array_key_exists('deleteCar', $_POST)){
    $query = "DELETE FROM cars WHERE idCars =\"".$_POST['id_Car']."\"";
    executeDML("CALL Log('DELETE','cars',".$_SESSION['uid'].")");
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

if(array_key_exists('deleteBike', $_POST)){
    $query = "DELETE FROM motorcycles WHERE idMotorC =\"".$_POST['id_Bike']."\"";
    executeDML("CALL Log('DELETE','motorcycles',".$_SESSION['uid'].")");
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

function getDatas($table){
    $query = "SELECT * FROM ".$table." WHERE owner = :uid";
    $params = [':uid'=>$_SESSION['uid']];
    return getList($query, $params);
}
function getMyDatas($table){
    $query = "SELECT * FROM ".$table." WHERE userID = :uid";
    $params = [':uid'=>$_SESSION['uid']];
    return getList($query, $params);
}

function My_data(){
    $data_1 = getMyDatas('irldatas');
    if(!empty($data_1)){
        $c = 'c_m_';
        $sz = 1;
        $a_sz = 1;
    foreach ($data_1 as $row){
        echo '<form name="my_on_edit" method="POST" ><tr>';
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="name" value="'.$row['name'].'"></td>'; $a_sz++;
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="age" value="'.$row['age'].'"></td>'; $a_sz++;
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="address" value="'.$row['address'].'"></td>';
        echo 
        '<td>
            <button type="submit" name="updateMy" >Módosít</button>
            <input   style =" visibility: hidden; width: 0px; height: 0px;" type="text" >
        </td>';
        echo '</tr></form>';$sz++;$a_sz = 1;
        }    
    }
    else{
       echo '<tr><td>Nincs megjeleníthető adat!</tr></tr>';
    }
}

function Car_data(){
    $data_2 = getDatas('cars');
    if(!empty($data_2)){
        $c = 'c_c_';
        $sz = 1;
        $a_sz = 1;
    foreach ($data_2 as $row){
        echo '<form name="cars_on_edit" method="POST" ><tr>';
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="idCar" value="'.$row['idCars'].'"></td>';$a_sz++;
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="brand" value="'.$row['brand'].'"></td>';$a_sz++;
        echo '<td id = "'.$c.$sz."_".$a_sz.'"><input name="color" value="'.$row['color'].'"></td>';
        echo 
        '<td>
            <button type="submit" name="updateCar" >Módosít</button>
            <button type="submit" name="deleteCar" >Törlés</button>
            <input name="id_Car"  style =" visibility: hidden; width: 1px; height: 1px;" type="text" value="'.$row['idCars'].'">
        </td>';
        echo '</tr></form>';$sz++;$a_sz = 1;
        }
    }
    else{
        echo '<tr><td>Nincs megjeleníthető adat!</tr></tr>';
    }
}
