<?php
	session_start();
	
	if(!ISSET($_SESSION['usuarios'])){
		header('location:login_docentes.html');
	}
?>