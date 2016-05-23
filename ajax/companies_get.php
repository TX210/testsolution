<?php 
    $mysqli = new mysqli("localhost", "root", "afterfall1290", "tx210"); 
    if ($mysqli->connect_errno) { 
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error; 
    }	

    $res = $mysqli->query("SELECT * FROM `companies`");
    $i=0;
    while ($row = $res->fetch_array(MYSQLI_NUM)){
        for ($j=0;$j<6;$j++){
           $main_row[$i][$j]=$row[$j]; 
        } 
    $i++;
    } 
    $json = json_encode($main_row);
    print_r ($json);
?>
