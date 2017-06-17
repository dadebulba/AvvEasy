<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include("connessione.php");         





	if (isset($_REQUEST["dip"])&&isset($_REQUEST["corso"])&&isset($_REQUEST["anno"])) {                     
                $dip = $_REQUEST["dip"];
                $corso = $_REQUEST["corso"];
                $anno = $_REQUEST["anno"];
                $titolo = "";
                $desc = "";
                $data="";

	}
        else if (isset($_REQUEST["dip"])&&isset($_REQUEST["corso"])) {                     
                $dip = $_REQUEST["dip"];
                $corso = $_REQUEST["corso"];
                $anno = 0;
                $titolo = "";
                $desc = "";
                $data="";

	}
        else if (isset($_REQUEST["dip"])) {                     
                $dip = $_REQUEST["dip"];
                $corso = 0;
                $anno = 0;
                $titolo = "";
                $desc = "";
                $data="";

	}
	else{
		

		$titolo = "";
                $desc = "";
                $data="";
                $dip=0;
                $corso=0;
                $anno=0;
		
	}
	   

            // Create connection
            $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $sql = "SELECT * FROM avviso WHERE dip IN ('$dip', 0) and corso IN('$corso', 0) and anno IN ('$anno', 0) ORDER BY id DESC ";
            
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $tutto = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $avviso=array(
                        'id'=> $row["id"],
                        'titolo'=>$row["titolo"],
                        'descr'=>$row["descr"],
                        'data'=>$row['data']
                    );
                    
                    array_push($tutto, $avviso);
                    
                }
                
                $avviso = json_encode($tutto);        
                echo $avviso;
                
            } else {
                echo "[]";
            }

            mysqli_close($conn);

    
