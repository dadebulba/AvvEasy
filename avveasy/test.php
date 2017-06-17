<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hackathonunitn";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM avviso WHERE dip='1' and corso='2' and anno='3'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Titolo: " . $row["titolo"]. " - Desc: " . $row["descr"]."<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 