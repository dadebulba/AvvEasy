<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("connessione.php");         



function testa($title)
{
	echo "<head>\n";
	echo "<title>$title</title>\n";
        echo " <script src='https://code.jquery.com/jquery-1.11.3.js'></script>";
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

testa("BACHECA");


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
                $dip="";
                $corso="";
                $anno="";
		
	}
	

	

	
	

	
	echo "<br><form action='bacheca.php' method='post'>\n";
	
	
	echo "<input type = 'hidden' name='stringa' value = '$stringa'>";
	echo "<input type = 'hidden' name='titolo' value = '$titolo'>";
        echo "<input type = 'hidden' name='desc' value = '$desc'>";
        echo "<input type = 'hidden' name='data' value = '$data'>";
        echo "<input type = 'hidden' name='dip' value = '$dip'>";
        echo "<input type = 'hidden' name='corso' value = '$corso'>";
        echo "<input type = 'hidden' name='anno' value = '$anno'>";
      


                echo "FILTRA<br><br>";
                echo "DIPARTIMENTO<br>";
                
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
		echo "<input type='submit' name='invia' value='INVIA'>";
	
	
	
	
echo "</form>\n";

	if (isset($_REQUEST["invia"])){

            // Create connection
            $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if($dip==0&&$corso==0&&$anno==0){
                $sql="SELECT * FROM avviso";
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
                    echo "Titolo: " . $row["titolo"]. " - Desc: " . $row["descr"]."<br>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
	}

echo "<br><form action='bacheca.php' method='post'>\n";

echo "</form>\n";

coda();
    
