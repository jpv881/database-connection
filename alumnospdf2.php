
<?php
	session_start();
   include('conexion.php');
    require_once 'lib/pdf/dompdf_config.inc.php';

      if($_SESSION['user'] == null){
       header('Location: login.php');
   }

$html=
	'<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<div class="container">';
        $sql = "select distinct alumnos.codigo as cod, alumnos.nombre, alumnos.apellidos from alumnos left join matriculas on alumnos.codigo = matriculas.cod_alumno left join modulos on matriculas.cod_modulo = modulos.codigo left join cursos on cursos.codigo = modulos.cod_curso order by alumnos.apellidos";
        $consulta = mysqli_query($conexion, $sql);
		$html .='<div class="page-header">
        <center><h1>ALUMNOS</h1></center>
			</div>
            <div class="col-md-10" id="divCuerpo">
								  <table class="table table-striped">
										<tr>
											<td><strong>Nombre</strong></td>
											<td><strong>Apellidos</strong></td>
										</tr>';


        while($fila = mysqli_fetch_array($consulta)){
        $nom= $fila['nombre'];
        $ap = $fila['apellidos'];
        $html .=
						'<tr>
							<td>'.$nom .'</td>
							<td>'.$ap.'</td>
							<td>
						</tr>';
                        }
	$html .=	'</table>
				</div>
        </div>
		</div>
	</body>
	</html>';


$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
$mipdf ->render();
$mipdf ->stream('FicheroEjemplo.pdf');

?>
