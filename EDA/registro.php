<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];
    
    // Manejo de la imagen de perfil (foto)
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == UPLOAD_ERR_OK) {
        $nombre_foto = $_FILES["foto"]["name"];
        $ruta_foto = "carpeta_de_destino/" . $nombre_foto; // Establece la ruta de destino en tu servidor
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto);
    }

    // Aquí puedes agregar código para validar y almacenar los datos del usuario en una base de datos.
    // Este es solo un ejemplo de cómo podrías procesar el formulario.

    if (empty($nombre) || empty($contrasena) || empty($fecha_nacimiento) || empty($sexo)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Aquí puedes insertar los datos en una base de datos (no se incluye la implementación real).
        // Ejemplo ficticio:
        /*
        $conexion = mysqli_connect("tu_host", "tu_usuario", "tu_contrasena", "tu_base_de_datos");
        $sql = "INSERT INTO usuarios (nombre, contrasena, fecha_nacimiento, sexo, foto) 
                VALUES ('$nombre', '$contrasena', '$fecha_nacimiento', '$sexo', '$ruta_foto')";
        mysqli_query($conexion, $sql);
        */

        // Redirige al usuario a la página de inicio después del registro exitoso
        header("Location: index.html");
        exit(); // Asegura que no se procesen más instrucciones después de la redirección
    }
}
?>
