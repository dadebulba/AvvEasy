<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function connessione() {
	include("connessione.php");		// contiene solo i parametri $db_host,$db_user,$db_password
	$conn=mysqli_connect($db_host,$db_user,$db_password);
	if($conn==FALSE)
		die("Errore connessione");
	mysqli_select_db($conn, $db_name)
		or die("Errore database");
        
	return $conn;
}
function query($stringa_sql,$db_conn) {		// esegue la query mysql (select, update, delete, ecc.)
		if ($db_conn->query($stringa_sql) === TRUE) {
    echo "avviso modificato";
} else {
    echo "Error: " . $stringa_sql . "<br>" . $db_conn->error;
}
	
}
function fetch_row($result) {		// estrae la singola riga dal risultato della query (array non associativo)
		$row=mysqli_fetch_row($result);
	return $row;
}
function num_row($result) {		// restituisce il numero di righe di $result
		$num_row=mysqli_num_row($result);
	return $num_row;
}
function close($db_conn) {
		mysqli_close($db_conn);
}

function testa($title)
{
	echo "<head>\n";
	echo "<title>$title</title>\n";
        //SCRIPT CALENDARIO
        echo "
            <link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
            <link rel='stylesheet' href='/resources/demos/style.css'>
            <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
            <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
            
            <script>
            $( function() {
              $( '#datepicker' ).datepicker();
            } );
            </script>  
        ";

        echo " <script type='text/javascript' src='scriptFiltro.js'></script>";
	echo "</head>\n";
	echo "<html>\n";
	echo "<body>\n";
	echo "<br>\n";
	echo "<h2>$title</h2>\n";
	echo "<br>\n";
}


function coda()
{
	echo "</body>\n";
	echo "</html>\n";
}

testa("CANCELLA AVVISO");

        if(isset($_REQUEST["id"])){
            $id = $_REQUEST["id"];
        }
        else{
            $id="";
        }
	
	if (isset($_REQUEST["si"])){
		$db_conn=connessione();
                if ($db_conn) {
                    
                                       
                    echo $id;
                    $s="DELETE FROM avviso   
                        WHERE id='$id'";
                    

                    query($s, $db_conn);
                        
                }	
                close($db_conn);	
                
            header("location: edit.php");
	}
	

	
	

	
	echo "<br><form action='cancel.php' method='post'>\n";
        
        echo "<input type = 'hidden' name='id' value = '$id'>";
	
            echo "SEI SICURO DI VOLER CANCELLARE L'AVVISO?<br>";
            echo "<input type='submit' name='si' value='SI'>";
            echo "<input type='submit' name='no' value='NO'>";
	
	
	echo "</form>";
		


	
coda();