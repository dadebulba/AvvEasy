<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


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

testa("MODIFICA AVVISO");


	if (isset($_REQUEST["id"])) {                     
                
		$id = $_REQUEST["id"];
                
                $conn = connessione();
// Check connection
                if (!$conn) {
                     die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM avviso WHERE id=$id";
                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    
                        $titolo=$row["titolo"];
                        $desc = $row["descr"];
                        $data = $row["data"];
                        $dip = $row["dip"];
                        $corso = $row["corso"];
                        $anno = $row["anno"];
                    }
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);

	}
	else{
		
		$id = "";
		$titolo = "";
                $desc = "";
                $data="";
                $dip="";
                $corso="";
                $anno="";
		
	}
	
	if (isset($_REQUEST["invia"])){
		$db_conn=connessione();
                if ($db_conn) {
                    
                    $titolo = $_REQUEST["titolo"];
                    $desc = $_REQUEST["desc"];
                    $data = $_REQUEST["data"];
                    $dip = $_REQUEST["dip"];
                    $corso = $_REQUEST["corso"];
                    $anno = $_REQUEST["anno"];
                  
                    $str="";
                    if($data[4]=="-")
                        $str=$data;
                    else
                        $str=$data[6].$data[7].$data[8].$data[9]."-".$data[0].$data[1]."-".$data[3].$data[4];
                    
                    
                    
                    $s="UPDATE avviso   
                        SET titolo = '$titolo', descr = '$desc', data = '$str', dip = '$dip', corso='$corso', anno='$anno' 
                        WHERE id='$id'";
                    

                    query($s, $db_conn);
                        
                }	
                close($db_conn);
                
                header("location: edit.php");
	}
	

	
	

	
	echo "<br><form action='editor.php' method='post'>\n";
	
	
	echo "<input type = 'hidden' name='id' value = '$id'>";
	echo "<input type = 'hidden' name='titolo' value = '$titolo'>";
        echo "<input type = 'hidden' name='desc' value = '$desc'>";
        echo "<input type = 'hidden' name='data' value = '$data'>";
        echo "<input type = 'hidden' name='dip' value = '$dip'>";
        echo "<input type = 'hidden' name='corso' value = '$corso'>";
        echo "<input type = 'hidden' name='anno' value = '$anno'>";
      


                echo "TITOLO<BR>";
                echo "<input type='text' name='titolo' value=$titolo>";
                echo"<br><br>DESCRIZIONE<br>";
                echo"<textarea style='width: 400px; height: 400px;' name='desc' >$desc</textarea>";
                echo"<br><br>DATA<br>";
                echo"<input type='text' id='datepicker' name='data' value=$data>";
                echo"<br>DIPARTIMENTO/CORSO/ANNO<br>";
                echo "<select id='departement_select' name='dip' value=$dip >
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

<select id='courses_select' name='corso' value=$corso>
    <option value='0'>TUTTI</option>

</select>


<select id='year_select' name='anno' value=$anno>
    <option value='0'>TUTTI</option>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
</select>";
		
echo "<input type='submit' name='invia' value='INVIA'>";
echo "</form>";

	

coda();
    
