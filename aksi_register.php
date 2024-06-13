<?php
    include "connection.php";
    $user = $_POST['username'];
    $psw = $_POST['password'];
    $level = $_POST['level'];
    $email = $_POST['email'];
    $sql = "INSERT INTO penulis (username,password,level,email) VALUES ('".$user."','".$psw."','".$level."','".$email."')";
    $query = $koneksi->query($sql);
    if($query === true){
        header('location: index.php');
    }else{
        echo "errooooooooor";
    }
?>