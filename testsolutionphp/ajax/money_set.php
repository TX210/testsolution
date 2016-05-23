<?php 
    $mysqli = new mysqli("localhost", "root", "afterfall1290", "tx210"); 
    if ($mysqli->connect_errno) { 
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error; 
    }	

    $max_level = 0;
    
    $res = $mysqli->query("SELECT * FROM `companies`");
    while ($row = $res->fetch_array(MYSQLI_NUM)){ 
        $level = intval($row[5]);
        if ($max_level < intval($level)){
            $max_level = 0 + intval($level);
        }
        
    } 
    for ($i=$max_level; $i>0; $i--){
        $res = $mysqli->query("SELECT id,earn,id_parent FROM companies WHERE level=$i");
        //$res = $mysqli->query("SELECT location,value FROM teachers WHERE id=$id_t");
        while ($row = $res->fetch_array(MYSQLI_NUM)){ 
            $res = $mysqli->query("UPDATE companies SET earn_all = earn_all + '$row[0]' WHERE id = '$row[1]'"); 
            echo "good";
        } 
    }
?>
