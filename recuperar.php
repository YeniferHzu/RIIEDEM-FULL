<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
        
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


require_once('conexion.php');
$correo = $_POST['correo'];

$query ="SELECT * FROM usuarios WHERE correo = '$correo'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.outlook.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Riiedem@outlook.com';                     //SMTP username
        $mail->Password   = 'UTFV8341';                               //SMTP password
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('Riiedem@outlook.com', ' Administrador del Repositorio RIEEDEM');
        $mail->addAddress($correo);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperacion de clave del RIIEDEM';
        $mail->Body    = 'Hola, este mensaje es por tu solicitud de recuperacion de tu contraseña dentro del Repositorio para docentes, por favor visite la siguiente pagina: <a href="localhost/riie/codigo_recuperacion.php?id_usuarios='.$row['id_usuarios'].'">Recuperar Contraseña</a>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
       echo "<script> alert('Solicitud Enviada');window.location= 'login_docentes.html?message=ok' </script>";
        // header ("location: login_docentes.html?message=ok");
    } catch (Exception $e) {
        echo "<script> alert('Error al enviar la solicitud');window.location= 'login_docentes.html?message=error' </script>";
        // header ("location: login_docentes.html?message=error");
    }

} else {
    echo "<script> alert('Correo no encontrado');window.location= 'login_docentes.html?message=not_found' </script>";
    //header ("location: login_docentes.html?message=not_found");
}


?>