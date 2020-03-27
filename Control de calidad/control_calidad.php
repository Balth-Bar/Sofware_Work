<?php
      
        if(isset($_POST['datos'])) { 
            echo "This is Button1 that is selected"; 
        } 
?> 
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Control de calidad</title>
        <link rel="stylesheet" href="css/Style_Ingreso.css">
    </head>
    <body>    
        <main>
           <div class="content">
               <ul>
                   <li><a href="Control de calidad.html">Control</a></li>
               </ul>
       </div>
       <br><br>
    <div class="form-control">   
        <br>
<?php
            include("db/conexion_db.php");
            $sql = $connection->query("SELECT Perfil lipídico,Fecha y hora, Nivel de control1, Nivel de control2 FROM prueba");
            echo 'Hola'
            echo '<table class="table table-hover">
            <tr>
                <th>Perfil lipídico</th>
                <th>Fecha y Hora</th>
                <th>Nivel de control1</th>
                <th>Nivel de control2</th>
              </tr>
            <tr>';   
                 
            while($result = $sql->fetch_array(MYSQLI_NUM)){
                $Perfil=$result[0];
                $Date=$result[1]
                $N1=$result[2];
                $N2=$result[3];
            }//Cerrar while

            echo "<td align='center'>".$Perfil."</td>
                        <td>".$Date."</td>
                        <td>".$N1."</td>
                        <td>".$N2."</td>
                        </tr>";
        echo"</table>";
    ?>
 
        <div class="contenedor-inputs">
            <h3 class="form__subtitulo">Perfil lipídico</h3>
            <p class="p-registro"><b>Colesterol Nivel 1:</b><?php echo $Col1_1 ?></p>
            <p class="p-registro"><b>Colesterol Nivel 2:</b><?php echo $Col2_1 ?></p>
            <p class="p-registro"><b>HDL Nivel 1:</b><?php echo $HDL1_1 ?></p>
            <p class="p-registro"><b>HDL Nivel 2:</b><?php echo $HDL2_1 ?></p>
            <p class="p-registro"><b>LDL Nivel 1:</b><?php echo $LDL1_1 ?></p>
            <p class="p-registro"><b>LDL Nivel 2:</b><?php echo $LDL2_1 ?></p>
            <p class="p-registro"><b>Triglicéridos Nivel 1:</b><?php echo $Trg1_1 ?></p>
            <p class="p-registro"><b>Triglicéridos Nivel 2:</b><?php echo $Trg2_1 ?></p>
            
           
        </div>

        <?php ?>
    <footer>
        <a href="#">www.hopital-bio-is.com.co</a> Teléfono: 123456789 correo: hopital-bio-is@udea.edu.co
    </footer>
            </div>
        </main>
    </body>
</html>

<!--?php
if(isset($_POST['submit']) && !empty($_POST['event_name']) && !empty($_POST['event_datetime'])){
    //db details
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'root';
    $dbName = 'codexworld';
    
    //Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Insert datetime into the database
    $name = $db->real_escape_string($_POST['event_name']);
    $datetime = $db->real_escape_string($_POST['event_datetime']);
    $insert = $db->query("INSERT INTO events (name,datetime) VALUES ('".$name."', '".$datetime."')");
    
    //Insert status
    if($insert){
        echo 'Event data inserted successfully. Event ID: '.$db->insert_id;
    }else{
        echo 'Failed to insert event data.';
    }
}
?-->