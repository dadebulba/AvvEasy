<?php

include("connessione.php");
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
    echo "New record created successfully";
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

testa("DASHBOARD");


	if (isset($_REQUEST["stringa"])) {                     
                
		$stringa = $_REQUEST["stringa"];
                $titolo = $_REQUEST["titolo"];
                $desc = $_REQUEST["desc"];
                $data=$_REQUEST["data"];
                $dip=$_REQUEST["dip"];
                $corso=$_REQUEST["corso"];
                $anno=$_REQUEST["anno"];

	}
	else{
		
		$stringa = "";
		$titolo = "";
                $desc = "";
                $data="";
                $dip=0;
                $corso=0;
                $anno=0;
		
	}
	
	if(isset($_REQUEST["add"])){
             header("location: insert.php");
        }
	

	
	

	
	echo "<br><form action='edit.php' method='post'>\n";
        
        
        echo "<input type='submit' name='add' value='AGGIUNGI AVVISO'><br>";
	
	
	echo "<input type = 'hidden' name='stringa' value = '$stringa'>";

	echo "<input type = 'hidden' name='titolo' value = '$titolo'>";
        echo "<input type = 'hidden' name='desc' value = '$desc'>";
        echo "<input type = 'hidden' name='data' value = '$data'>";
        echo "<input type = 'hidden' name='dip' value = '$dip'>";
        echo "<input type = 'hidden' name='corso' value = '$corso'>";
        echo "<input type = 'hidden' name='anno' value = '$anno'>";
      
    
        echo "<select id='departement_select' name='dip'>
    <option value='0'>Tutti</option>
    <option value='10027'>Centro Interdipartimentale Biologia Integrata- CIBio</option>
    <option value='10030'>Centro interdipartimentale Mente/Cervello- CIMeC</option>
    <option value='10019'>Dipartimento di Economia e Management</option>
    <option value='10025'>Dipartimento di Fisica</option>
    <option value='10021'>Dipartimento di Ingegneria Civile, Ambientale e Meccanica</option>
    <option value='10023'>Dipartimento di Ingegneria e Scienza dell'Informazione</option>
    <option value='10022'>Dipartimento di Ingegneria Industriale</option>
    <option value='10024'>Dipartimento di Lettere e Filosofia</option>
    <option value='10026'>Dipartimento di Matematica</option>
    <option value='10029'>Dipartimento di Psicologia e Scienze Cognitive</option>
    <option value='10028'>Dipartimento di Sociologia e Ricerca Sociale</option>
    <option value='10031'>Scuola di studi Internazionali</option>
</select>

<select id='courses_select' name='corso'>
    <option value='0'>TUTTI</option>

</select>


<select id='year_select' name='anno'>
    <option value='0'>TUTTI</option>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
</select>";
		
echo "<input type='submit' name='invia' value='FILTRA'><br>";
echo "</form>\n";
        

if (isset($_REQUEST["invia"])){

            // Create connection
            $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if($dip==0&&$corso==0&&$anno==0){
                $sql="SELECT * FROM avviso WHERE dip='0' and corso='0' and anno='0'";
            }
            else if($corso==0&&$anno==0){
                $sql = "SELECT * FROM avviso WHERE dip='$dip'";
            }
            else if($anno==0){
                $sql = "SELECT * FROM avviso WHERE dip='$dip' and corso='$corso'";
            }
            else{
                $sql = "SELECT * FROM avviso WHERE dip='$dip' and corso='$corso' and anno='$anno'";
            }
            $result = mysqli_query($conn, $sql);


            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $temp = $row['id'];
                    echo "<a href='editor.php?id=$temp'>";
                    echo "    <img src='edit.png'>";
                    echo "</a>";
                    echo "<a href='cancel.php?id=$temp'>";
                    echo "    <img src='canc.png'>";
                    echo "</a>";
                    echo "&nbsp;&nbsp;&nbsp;&nbsp; Titolo: " . $row["titolo"]. " - Desc: " . $row["descr"]."<br>";
                    
                     
                    
                    
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
	}
        
        
	

	
	


	

coda();
    
