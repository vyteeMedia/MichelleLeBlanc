<?php
session_start();
if (isset($_POST['enviar'])) { // comprobamos que se hayan enviado los datos del formulario
    // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
    if (empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
        echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
    } else {
        // "limpiamos" los campos del formulario de posibles códigos maliciosos
        $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);
        $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']);

        // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
        // USUARIO LOCAL
        if($usuario_nombre=="prueba"&&$usuario_clave=="pruebapass"){
            $_SESSION['usuario_nombre'] = $usuario_nombre; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
            echo "Bienvenido, " . $_SESSION['usuario_nombre'] . " <a href='heimdall.php'>haz click aqui para continuar</a>";
            /*echo '
                <body>
                    <script type="text/javascript">
                        window.location="heimdall.php";
                    </script>
                </body>
            ';*/
        } else {
            ?>
        Error, <a href="acceso.php">Reintentar</a>
        <?php
        }
    }
} else {
    header("Location: acceso.php");
}
?>