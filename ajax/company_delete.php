<?php 
    $mysqli = new mysqli("localhost", "root", "afterfall1290", "tx210"); 
    if ($mysqli->connect_errno) { 
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error; 
    }	
    $id = $_POST["id"];

    $res = $mysqli->query("DELETE FROM companies WHERE id = '$id'"); 
?>
