<?php
		$conn = mysqli_connect("localhost", "root", "", "riiedem");
		if(!$conn){
			die("Error: Error al conectar a la Base de Datos!");
		}

		$mysqli = new mysqli('localhost', 'root', '', 'riiedem');
	   if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
	}

	function conexion () {
		$conexion=mysqli_connect('localhost', 'root' ,'', 'riiedem');
		return $conexion;
		}

	function ListarDocente($id_usuarios) {
		$sql="SELECT * FROM usuarios WHERE id_usuarios=$id_usuarios";
		$query=mysqli_query(conexion(),$sql);
		return mysqli_fetch_assoc($query);
	}

    function verificar ($correo) {
    $sql = "SELECT * FROM usuarios WHERE correo =$correo";
    $query = mysqli_query(conexion(), $sql);
    return $query;
    }

	function actualizar($id_usuarios,$nombre,$apellido1, $apellido2,$correo,$foto) {
		$sql= "UPDATE usuarios SET nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', correo='$correo', foto='$foto' WHERE id_usuarios=$id_usuarios";
		$query=mysqli_query(conexion(),$sql);
		return $query;
	
	}
	
	function actualizarsinfoto($id_usuarios,$nombre,$apellido1, $apellido2,$correo) {
		$sql= "UPDATE usuarios SET nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', correo='$correo' WHERE id_usuarios=$id_usuarios";
		$query=mysqli_query(conexion(),$sql);
		return $query;
	}

	function insertar ($nombre,$apellido1,$apellido2,$correo,$password,$foto) {
		$sql= "INSERT INTO usuarios (nombre,apellido1,apellido2,correo,password,foto) VAlUES('$nombre','$apellido1','$apellido2','$correo','$password','$foto')";
		$query=mysqli_query(conexion(),$sql);
			return $query;
		}

    function insertarsinfoto ($nombre,$apellido1,$apellido2,$correo) {
		$sql= "INSERT INTO usuarios (nombre,apellido1,apellido2,correo) VAlUES('$nombre','$apellido1','$apellido2','$correo')";
		$query=mysqli_query(conexion(),$sql);
			return $query;
		}
		
		function eliminar($id_usuarios) {
			$sql= "DELETE FROM usuarios WHERE id_usuarios=$id_usuarios";
			$query=mysqli_query(conexion(),$sql);
			return $query;
		}
?>