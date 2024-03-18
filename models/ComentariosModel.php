<?php
class ComentariosModel
{
    function __construct()
    {
    }


    function INSERT($nombre, $email, $telefono, $comentario)
    {
        $Conexion = new Conexion();
        $mysqli = $Conexion->crearConexion();

        if ($mysqli != null) {
            $sql = "INSERT INTO comentarios (nombre, email, telefono, comentario) 
    VALUES ('$nombre', '$email', '$telefono', '$comentario')";
        }

        if ($mysqli->query($sql) == TRUE) {
            return "Hemos recibido su comentario exitosamente.";
        } else {
            return "Hubo un error al insertar, intente de nuevo; error:" . $mysqli->error . "\n";
        }

        $mysqli->close();
    }


    function UPDATE($idComentario, $nombre, $email, $telefono, $comentario)
    {

        $Conexion = new Conexion();
        $mysqli = $Conexion->crearConexion();

        if ($mysqli != null) {
            $sql = "UPDATE comentarios 
        SET nombre='$nombre', email='$email', telefono='$telefono', comentario='$comentario' 
        WHERE id = $idComentario";
        }
        if ($mysqli->query($sql)) {
            return "Comentario actualizado";
        } else {
            return "Hubo un error: " . $mysqli->error;
        }

        $mysqli->close();
    }


    function SELECT()
    {
        $conexion = new Conexion();
        $mysqli = $conexion->crearConexion();
        if ($mysqli !== null) {
            //una vez se establece la conexion, se obtienen los datos de una tabla: tblcomentarios
            $getComents = $mysqli->query("SELECT * FROM comentarios");
        } else {
            echo "Falló la conexión: " . $mysqli; //notifica que hubo un error y cual error fue aparentemente
        }
        $mysqli->close(); //?cerrar conexion  

        return $getComents;
    }


    function DELETE($idComentario)
    {
        $Conexion = new Conexion();
        $mysqli = $Conexion->crearConexion();
        if ($mysqli != null) {
            $sql = "DELETE FROM comentarios WHERE id=$idComentario";
        }
        if ($mysqli->query($sql)) {
            return "Eliminacion exitosa.";
        } else {
            return "Eliminacion fallida; error: " . $mysqli->error;
        }
        $mysqli->close();
    }
}
