
	<?php
		$conexion = new mysqli("domain", "user","password","database");

    	if(mysqli_connect_errno()){
            echo "Error al conectar";
        }else{
                //echo "Conexión realizada";
        }

        mysqli_set_charset($conexion, "utf8");

?>
