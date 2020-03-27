<!DOCTYPE html>
<html lang= "es">


    <head>

        <meta charset="utf-8">
        <title>serch</title>
        <link rel="stylesheet" href="css/style_In.css">
        <?php 

        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "datos";
            $connection = new mysqli($servername, $username, $password, $dbname);

            if (!$connection) {
                echo "Falló la conexión a MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
            }
            else{

                $ced = $_POST['ced'];
                $sql = $connection->query("SELECT * FROM pacientes WHERE cedula = $ced") or die (mysql_error());
                while($resultados = $sql->fetch_array(MYSQLI_NUM)) {
                    
                    $nom    = $resultados  [1];
                    $ced    = $resultados  [2];
                    $apel   = $resultados  [3];
                    $age    = $resultados  [4];
                    $gen    = $resultados  [5];
                    $eps    = $resultados  [6];
                    $cplt   = $resultados  [7];
                    $hdl    = $resultados  [8];
                    $ldl    = $resultados  [9];
                    $trigl  = $resultados [10];
                    
                }

      
            }
        ?>
        
    </head>

    <body>

        <div class="navbar"   >
              
            <div style="padding: 8px 0px 0px 0px;">
                
                <a href="index.html"  >   
                    <img src="Img/home.png" width="50" height="50" >
                </a> 
            </div>
            
            <div style="padding: 10px 0px 0px 0px;" >
    
                <a href="register.html" >   
                    <img src="Img/add.png" width="50" height="50" >
                </a> 

            </div>

            <div style="padding: 10px 0px 0px 0px;" >
    
                <a href="serch.html" >   
                    <img src="Img/serch.png" width="50" height="50" >
                </a> 

            </div> 
            <div style="padding: 10px 0px 0px 0px;" >
        
                <a href="log.html" >   
                    <img src="Img/profile.png" width="50" height="50" >
                </a> 

            </div>     
          
        </div>

        <div id="container">
                     

            <div >
                <form action="log.html" method="post" id="contact_form">
                    <div >

                        <label for="name"></label>
                        <H2>Datos básicos del paciente</H2>

                    </div>


                    <div style = "padding: 25px 70px 300px 0px;">

                        <div class = "date1"  style = "padding: 0px 0px 0px 145px;">
                            <label for="name"></label>
                            <p><b>Documento de identidad:</b> <?php echo $ced?></p>
                            <p><b>Nombres:</b>  <?php echo $nom?></p>
                            <p><b>Apellidos:</b>  <?php echo $apel?></p>
                            <p><b>Género:</b>  <?php if ($gen==1) { echo "Masculino"; } elseif($gen == 2) { echo "Femenino";}elseif($gen == 3) { echo "Otro";} ?></p>
                            <p><b>EPS:</b> <?php if ($eps ==1){echo "Aliansalud"; } elseif($eps == 2) { echo "Saludtotal";}elseif($eps == 3) { echo "Cafesalud";}elseif($eps == 4) { echo "Sanitas";}elseif($eps == 5) { echo "Compensar";}elseif($eps == 6) { echo "Confenalco";}elseif($eps == 7) { echo "Sura";}elseif($eps == 8) { echo "Comfenal";}elseif($eps == 9) { echo "Coomeva";}elseif($eps == 10) { echo "Damisar";}?></p>
    
                        </div>


                        <div class = "date1"  >
                            <br>
                            <br>
                            <label for="name"></label>
                            <p><b>Col total:</b> <?php echo $cplt?></p>
                            <p><b>HDl:</b>  <?php echo $hdl?></p>
                            <p><b>LDL:</b>  <?php echo $ldl?></p>
                            <p><b>Triglicéridos:</b> <?php echo$trigl ?></p>
                            
    
                        </div>
                    </div>

                    <div  style="margin: 30px 0px 35px 290px;"> 
                        <input type="submit" value="Regresar"  class="botton" />
                    </div>

                </form>
            </div>