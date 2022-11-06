<?php

class Database
{
    private $hostname = "localhost";
    private $database = "tienda_online";
    private $username = "tienda_online";
    private $password = "tienda_online";
    private $charset = "urf8";

    function conectar()
    {
        try {
            $conexión = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexión, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexión: ' . $e->getMessage();
            exit;
        }
    }
}
