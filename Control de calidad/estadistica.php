<?php 
//$cart = array();
//array_push($cart, 13);
//array_push($cart, 14);

// Or 
//$cart = array();
//array_push($cart, 13, 14);
//print "{$cart}";
//$bar = array("value" => "foo");

//print "Esto es {$bar['value']} !";

//$pc = new C_PhpChartX(array(array(11, 9, 5, 12, 14)),‘basic_chart’);
//$pc->draw();
//stats_variance ( array $a [, bool $sample = false ] ) : float
//$media = array_sum($numeros)/count($numeros);
//stats_standard_deviation ( array $a [, bool $sample = false ] ) : float
//$nombre = "Aner"; 
//$array = array(1, 2, 3, "casa", $nombre);
 
//saco el numero de elementos
//$longitud = count($array);
 
//Recorro todos los elementos
//for($i=0; $i<$longitud; $i++)
//      {
      //saco el valor de cada elemento
//	  echo $array[$i];
//	  echo "<br>";
//      }

class RandomTable{

    public $IDr = 0 ;
    //Función que crea y devuelve un objeto de conexión a la base de datos y chequea el estado de la misma. 
    function conectarBD(){ 
            $server = "localhost";
            $usuario = "root";
            $pass = "";
            $BD = "GeekyTheoryBD";
            //variable que guarda la conexión de la base de datos
            $conexion = mysqli_connect($server, $usuario, $pass, $BD); 
            //Comprobamos si la conexión ha tenido exito
            if(!$conexion){ 
               echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>'; 
            } 
            //devolvemos el objeto de conexión para usarlo en las consultas  
            return $conexion; 
    }  
    /*Desconectar la conexion a la base de datos*/
    function desconectarBD($conexion){
            //Cierra la conexión y guarda el estado de la operación en una variable
            $close = mysqli_close($conexion); 
            //Comprobamos si se ha cerrado la conexión correctamente
            if(!$close){  
               echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>'; 
            }    
            //devuelve el estado del cierre de conexión
            return $close;         
    }

    //Devuelve un array multidimensional con el resultado de la consulta
    function getArraySQL($sql){
        //Creamos la conexión
        $conexion = $this->conectarBD();
        //generamos la consulta
        if(!$result = mysqli_query($conexion, $sql)) die();

        $rawdata = array();
        //guardamos en un array multidimensional todos los datos de la consulta
        $i=0;
        while($row = mysqli_fetch_array($result))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
            $rawdata[$i] = $row;
            $i++;
        }
        //Cerramos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos rawdata
        return $rawdata;
    }
    //inserta en la base de datos un nuevo registro en la tabla usuarios
    function insertRandom(){
        //Generamos un número entero aleatorio entre 0 y 100
        $ran = rand(0, 100);
        //creamos la conexión
        $conexion = $this->conectarBD();
        //Escribimos la sentencia sql necesaria respetando los tipos de datos
        $sql = "insert into random (valor) 
        values (".$ran.")";
        //hacemos la consulta y la comprobamos 
        $consulta = mysqli_query($conexion,$sql);
        if(!$consulta){
            echo "No se ha podido insertar en la base de datos<br><br>".mysqli_error($conexion);
        }
        //Desconectamos la base de datos
        $this->desconectarBD($conexion);
        //devolvemos el resultado de la consulta (true o false)
        return $consulta;
    }
    function getAllInfo(){
        //Creamos la consulta
        $sql = "SELECT * FROM random;";
        //obtenemos el array con toda la información
        return $this->getArraySQL($sql);
    }
}


?>