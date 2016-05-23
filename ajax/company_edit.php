<?php 
    $mysqli = new mysqli("localhost", "root", "afterfall1290", "tx210"); 
    if ($mysqli->connect_errno) { 
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error; 
    }	
    $name = $_POST["name"];
    $money = $_POST["money"];
    $id = $_POST["id"];

    $res = $mysqli->query("UPDATE companies SET name = '$name', earn = '$money' WHERE id = '$id'"); 
?>
