<!DOCTYPE html>
<html lang= "es">

    <head>
        <meta charset="utf-8">
        <title>register</title>
        <link rel="stylesheet" href="css/style_In.css">

        <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "datos";
            $status = "";

            $connection = new mysqli($servername, $username, $password, $dbname);

            if (!$connection) {
                echo "Falló la conexión a MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
            }
            else{


                
                $name   = $_POST  ['nom'];
                $lname  = $_POST ['lnom'];
                $ced  =   $_POST  ['ced'];
                $age    = $_POST  ['age'];
                $gen    = $_POST  ['gen'];
                $eps    = $_POST  ['eps'];
                $ncolt  = $_POST ['colt'];
                $hdl    = $_POST  ['hdl'];
                $ldl    = $_POST  ['ldl'];
                $trigl  = $_POST['trigl']; 
                  
                
                $sql = "SELECT * FROM pacientes where cedula like '$ced' ";
                $reresultado = mysqli_query($connection,$sql);

                if(mysqli_num_rows($reresultado)>0)
                {
                    $status="Existente";
    

                }else{
                    $status = "Ingresado"; 
                    $sql = "INSERT INTO `pacientes` (`registro`, `nombre`, `cedula`, `apellido`, `edad`, `genero`, `eps`, `cplt`, `hdl`, `ldl`, `trigl`) VALUES (NULL, '$name', '$ced', '$lname', '$age', '$gen', '$eps', '$ncolt', '$hdl', '$ldl', '$trigl')";
                    $reresultado = mysqli_query($connection,$sql);
                }
                
            
            }

            
        ?>
        
    </head>

    <body>

    <div class="navbar">
                
                <a href="index.html" class="nb">   
                    <img src="Img/Home.png" width="50" height="50">
                </a> 
            
        </div>

        <div id="container">

            <div>
                <label for="name"></label>
                <p class = "date1"><b>Nombres:</b>  <?php echo $name?></p>

            </div>

            <div>
                <label for="name"></label>
                <p class = "date2"><b>Estado:</b>  <?php echo $status?></p>

            </div>
            


            <div class="navbar">
    
                <a href="register.html" class="nb">   
                    <input type="submit" value="Ingresar Nuevo usuario"  />
                </a> 
                    
            </div>

        </div>
        



    </body>

    

    

