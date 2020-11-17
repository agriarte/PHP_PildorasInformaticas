<?php
class DataBase
{
    public static function Conectar()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=tallerdeappspf;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
?>


