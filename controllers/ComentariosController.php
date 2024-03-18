<?php
require "../models/ComentariosModel.php"; //?importar clietesMoldel para su proximo uso
require "../models/Conexion.php";
$opc = $_POST["opcionOpc"];

switch ($opc) {
    case 1:
        $clientes = new ComentariosModel();

        # Registrar comentarios de clienes
        //recibe los valores enviados por la url desde el formulario de contactos

        $nombre = $_POST['txtNombre'];
        $email  = $_POST['txtEmail'];
        $tel    = $_POST['txtTelefono'];
        $coment = $_POST['txtComentario'];
        //REGISTRAR LOS VALORES EN LA BASE DE DATOS
        $res = $clientes->INSERT($nombre, $email, $tel, $coment);
        echo $res;
        break;
        #bd- base de datos- conjunto de datos almacenados bajo un contexto

    case 2:
        $comentarios = new ComentariosModel();
        $getComments = $comentarios->SELECT();
        if ($getComments) {
            while ($fila = $getComments->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["email"] . "</td>";
                echo "<td>" . $fila["telefono"] . "</td>";
                echo "<td>" . $fila["comentario"] . "</td>";
                echo "<td>";
                //            echo "<button type='button' class='btn btn-primary' \"onclick=actualizar('".$fila["idComentario"]."\",\"".$fila["nombre"]."\",\"".$fila["email"]."\",\"".$fila["telefono"]."\",\"".$fila["comentario"]."\")'>Editar comentario</button>";
                //          echo "<button type='button' class='btn btn-danger' \"onclick=eliminar()\">Eliminar comentario</button>";
                echo "<button type='button' class='btn btn-primary' onclick=\"actualizar('" . $fila["id"] . "','" . $fila["nombre"] . "','" . $fila["email"] . "','" . $fila["telefono"] . "','" . $fila["comentario"] . "')\">Editar comentario</button>";
                echo "<button type='button' class='btn btn-danger' onclick=\"eliminar('" . $fila["id"] . "')\">Eliminar comentario</button>";

                echo "</td>";
                echo "</tr>";
            }
        }
        break;

    case 3:
        $clientes = new ComentariosModel();

        $idComentario = $_POST['hddIdComentario'];
        $nombre = $_POST['txtNombre'];
        $email  = $_POST['txtEmail'];
        $telefono    = $_POST['txtTelefono'];
        $comentario = $_POST['txtComentario'];

        $res = $clientes->UPDATE($idComentario, $nombre, $email, $telefono, $comentario);
        echo $res;
        break;

    case 4:
        $clientes = new ComentariosModel();
        $idComentario = $_POST['idComentario'];
        $res = $clientes->DELETE($idComentario);
        echo $res;
        break;

    default:
        # code...
        break;
}
