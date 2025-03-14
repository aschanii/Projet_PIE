<?php
$host='localhost';
$dbname='students_isgi_1';
$username='root';
$password='';

try{
    $connexion= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //  echo"connexion succed";
} catch(PDOException $e){
    die("Erreur de connexion:" . $e->getMessage());
}   
