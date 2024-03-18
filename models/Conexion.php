<?php
class Conexion
{
    private $HOST = "127.0.0.1";
    private $USER = "unicuc";
    private $PWD = "1234";
    private $DB = "gamedegipto";

    function __construct()
    {
    }

    function crearConexion()
    {
        $mysqli = new mysqli($this->HOST, $this->USER, $this->PWD, $this->DB);
        if ($mysqli->connect_errno) {
            return null;
        }
        return $mysqli;
    }
}
