<?php 
    $mysqli = new mysqli("localhost", "root", "afterfall1290", "tx210"); 
    if ($mysqli->connect_errno) { 
        echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error; 
    }	
    $name = $_POST["name"];
    $money = $_POST["money"];
    $parent = $_POST["parent"];
    

    if ($parent == "") {
        $res = $mysqli->query("INSERT INTO `companies` (`name`,`earn`,id_parent,level,earn_all) VALUES ('$name','$money','0','0','$money')");  
        
    } else {
        $id = $mysqli->query("SELECT * FROM companies WHERE name='$parent'"); 
        $id = $id->fetch_array(MYSQLI_NUM);
        $level = $id[5] + 1;
        $res = $mysqli->query("INSERT INTO `companies` (`name`,`earn`,id_parent,level,earn_all) VALUES ('$name','$money','$id[0]','$level','$money')");  
        //echo "$id[6]";
    }
?>
