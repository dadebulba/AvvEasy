<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$password = $_POST['password'];
$utente = $_POST['utente'];
    
    if (strcmp($password,"admin") == 0 && strcmp($utente,"admin")==0)
        header("location: edit.php");
    
    