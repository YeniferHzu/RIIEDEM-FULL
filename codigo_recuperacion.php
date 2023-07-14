<!DOCTYPE html>
<html lang="ES">
<head>
    <title>Código de recuperación</title>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/header_and_footer.css">
    <link rel="shortcut icon" type="text/css" href="icono.png"><!--Icono de las pestañas-->
</head>

<body>

<header id="main-header">
        
        <a id="logo-header" href="index.html">
        <img class="icono" src="icono.png">
        <span class="site-name">RIIEDEM</span>
        <span class="site-desc">Rspositorio Institucional para Instituciones Educativas Del Estado De México</span>
    </a> <!-- / #logo-header -->

</header><!-- / #main-header -->

    <div class="div_con_texto"> <!--Inicio del contenido del cuerpo-->

        <div class="div_con_texto2">

        <h4 align="center">Repositorio Institucional Para Instituciones Educativas Del Estado De México</h4>
        <br><br>

                <form method="POST" action="change_password.php" name="recupera">
                        <table align="center">
                            <tr>
                                <th colspan="2"><h2>Solicitud de Contraseña Nueva</h2></th>
                            </tr>
                            <tr>
                                <th class="izquierdo"><label>Nueva Contraseña</label></th>
                                <td><input type="text" name="new_password" placeholder="Nueva Contraseña" required=""></td>
                                <input type="hidden" name="id_usuarios" value="<?php echo $_GET['id_usuarios']; ?>">
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <button type="siguiente" name="siguiente">Aceptar</button>
                                </th>
                            </tr>
                            <!--
                            <tr>
                                <th colspan="2"><a href="recupera.html">Atrás</a></th>
                            </tr>
                            -->
                        </table>
                    </form>

            </div><!--Div_Con_texto2

    Recuperar contraseña https://programacion.net/articulo/sistema_de_recuperacion_de_contrasenas_con_php_y_mysql_1707
-->
    </div>

    <footer id="main-footer">
        <p>&copy; 2023</p>
    </footer>

</body>
</html>