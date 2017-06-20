<?php
try{
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $db=new PDO("mysql:host=localhost; dbname=Bissonabisso", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Error : '.$e->getMessage());
    
}

