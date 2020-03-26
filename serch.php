<!DOCTYPE html>
<html lang= "es">

    <head>
        <meta charset="utf-8">
        <title>register</title>
        <link rel="stylesheet" href="Proyecto/css/style_In.css">

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

                $name   = $_POST  ['user'];
                $pass   = $_POST ['pass'];
    
                  
                
                $sql = "SELECT * FROM usuarios where usuario like '$name' AND pass like '$pass' ";
                $reresultado = mysqli_query($connection,$sql);

                if(mysqli_num_rows($reresultado)>0)
                {
                    $status="1";
                    echo"esta dentro del sistema";
    

                }else{
                    $status= "2";
                    echo"usuario incorrecto";
                }
                
            
            }

            

            
        ?>

        <body>

            tabla con pacientes 
            
        </body>
        
    </head>