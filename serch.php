<!DOCTYPE html>
<html lang= "es">

    <head>

        <meta charset="utf-8">
        <title>serch</title>
        <link rel="stylesheet" href="css/style_In.css">
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

                <form action="serch.html" method="post" id="contact_form">
                    <div >
                        <label for="name"></label>
                        <H2>Usuarios en el sistema</H2>

                    </div>
                   
                    <div style="margin: 0px 0px 0px 110px;">
                        <label for="name"></label>
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

                                $auto = $_GET['auto'];

                                if($auto == 0){
                                    
                                    $name   = $_POST  ['user'];
                                    $pass   = $_POST ['pass'];
                                
                                }else{
                                    $name   = $_GET  ['user'];
                                    $pass   = $_GET ['pass'];

                                }
                          
                                
                                $sql = "SELECT * FROM usuarios where usuario like '$name' AND pass like '$pass' ";
                                $reresultado = mysqli_query($connection,$sql);

                                if(mysqli_num_rows($reresultado)>0)
                                {
                                    echo '<table border="1" cellspacing="0" cellpadding="5">
                                    <tr align="center" bgcolor="#36747D">
                                    <td><strong>No.</strong></td>
                                    <td><strong>ID</strong></td>
                                    <td><strong>NOMBRE</strong></td>
                                    <td><strong>APELLIDO</strong></td>
                                    <td><strong>CEDULA</strong></td>
                                    </tr>
                                    <tr>';

                                    $i=0;
                                    $sql = $connection->query("SELECT * FROM pacientes ") or die (mysql_error());
                                    while($resultados = $sql->fetch_array(MYSQLI_NUM)) {
                                        $cod  = $resultados[0];
                                        $nom  = $resultados[1];
                                        $ced  = $resultados[2];
                                        $apel = $resultados[3];

                                        $i=$i+1;  
                                        echo "<td align='center'>".$i."</td>
                                        <td><a href='data_list.php?id=".$cod."&user=".$name."&pass=".$pass."'>".$cod."P0051</a></td>
                                        <td>".$nom."</td>
                                        <td>".$apel."</td>
                                        <td>".$ced."</td>
                                        </tr>";  
                                        
                                    };
                                    echo " </table>"; 

                                }else{

                                   echo'<div><H2 style = "margin: 0px 0px 0px -120px; color: blueviolet;">Usuario o Contraseña incorrectos</H2></div>';
                         
                                }                        
                            
                            }
                    
                        ?>
                    </div>

                    <div  style="margin: 20px 20px -40px 440px;">
                        <input type="submit" value="Regresar" class="botton"  />
                    </div>
                    
                </form>
            </div>
            
        
            
        </div>

    
        
    </body>
        
    