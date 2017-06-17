<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>AVVEASY</title>
        <script src='https://code.jquery.com/jquery-1.11.3.js'></script>
        <script type='text/javascript' src='scriptFiltro.js'></script>
    </head>
    <body ><div>




            <table style="border-collapse: collapse" width="100%" cellspacing="0" cellpadding="0" bordercolor="#111111" border="0">
                <tbody><tr>
                        <td width="20%" bgcolor="#622545">

                            <table style="border-collapse: collapse" align="right" width="100%" cellspacing="0" cellpadding="10" bordercolor="#111111" border="0">
                                <tbody><tr>
                                        <td>

                                            <p align="left">  <img src="logo.png" <="" td="" border="0">
                                            </p></td></tr>

                                </tbody></table>
                        </td>
                        <td height="73" width="60%" bgcolor="#622545">
                            <p align="center"><b><font size="7" color="#FFFFFF">
                                    <span style="background-color: #622545">AVVEASY&nbsp;</span> 

                                    <br>
                                    <center>
                                        <form action='index.php' method='post'>


                                            <input type = 'hidden' name='stringa' value = '$stringa'>
                                            <input type = 'hidden' name='titolo' value = '$titolo'>
                                            <input type = 'hidden' name='desc' value = '$desc'>
                                            <input type = 'hidden' name='data' value = '$data'>
                                            <input type = 'hidden' name='dip' value = '$dip'>
                                            <input type = 'hidden' name='corso' value = '$corso'>
                                            <input type = 'hidden' name='anno' value = '$anno'>




                                            <select id='departement_select' name='dip'>
                                                <option value='0'>TUTTI</option>
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
                                            </select>
                                            <input type='submit' name='invia' value='INVIA'>




                                        </form>
                                    </center>

                                    <td width="20%" bgcolor="#622545">

                                        <p align="right">
                                            <img src="avveasy.png" width="50%" height="50%" <="" td="" border="0">
                                        </p></td></tr> 
                    <tr>
                    </tr></tbody></table>


            <table class="avviso" style="border-collapse: collapse" width="100%" cellspacing="1" cellpadding="10" bordercolor="#111111" border="0">
                <tbody>

                   


                    <?php
                    
                    if (isset($_REQUEST["invia"])) {
                        $dip=$_REQUEST["dip"];
                        $corso=$_REQUEST["corso"];
                        $anno=$_REQUEST["anno"];
                        include("connessione.php");
                        // Create connection
                        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        if ($dip == 0 && $corso == 0 && $anno == 0) {
                            $sql = "SELECT * FROM avviso";
                        } else if ($corso == 0 && $anno == 0) {
                            $sql = "SELECT * FROM avviso WHERE dip='$dip'";
                        } else if ($anno == 0) {
                            $sql = "SELECT * FROM avviso WHERE dip='$dip' and corso='$corso'";
                        } else {
                            $sql = "SELECT * FROM avviso WHERE dip='$dip' and corso='$corso' and anno='$anno'";
                        }
                        $result = mysqli_query($conn, $sql);


                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                              
                                if ($i == 0) {
                                    echo "
                    <td colspan='3' align='justify' bgcolor='#F1F3F1'>
                    <font size='5' face='Arial, Helvetica, sans-serif'>$row[titolo]<br>$row[descr]</font> 
                    <br><font size='2' color='#004080'>Inserito il $row[data]</font></td>
                    </tr>
                    ";
                                    $i = 1;
                                } else {
                                    echo "
                    <td colspan='3' align='justify' bgcolor='#D3E4E2'>
                    <font size='5' face='Arial, Helvetica, sans-serif'>$row[titolo]<br>$row[descr]</font> 
                    <br><font size='2' color='#004080'>Inserito il $row[data]</font></td>
                    </tr>
                    ";
                                    $i = 0;
                                }
                            }


                            mysqli_close($conn);
                        }
                    } else {
                        include("connessione.php");
                        // Create connection
                        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM avviso WHERE dip='0' and corso='0' and anno='0'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                              
                                if ($i == 0) {
                                    echo "
                    <td colspan='3' align='justify' bgcolor='#F1F3F1'>
                    <font size='5' face='Arial, Helvetica, sans-serif'>$row[titolo]<br>$row[descr]</font> 
                    <br><font size='2' color='#004080'>Inserito il $row[data]</font></td>
                    </tr>
                    ";
                                    $i = 1;
                                } else {
                                    echo "
                    <td colspan='3' align='justify' bgcolor='#D3E4E2'>
                    <font size='5' face='Arial, Helvetica, sans-serif'>$row[titolo]<br>$row[descr]</font> 
                    <br><font size='2' color='#004080'>Inserito il $row[data]</font></td>
                    </tr>
                    ";
                                    $i = 0;
                                }
                            }


                            mysqli_close($conn);
                        }
                    }
                    ?>


                </tbody></table>

            <p>&nbsp;</p>
            DEVELOPED BY DAVIDE <B> BULBARELLI </B>

        </div>




    </body></html>