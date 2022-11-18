<?php
$host = 'localhost';
$dbname = 'dbfox';
$username = 'root';
$password = '50bb11b76';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    //echo '<script language="javascript">alert("Conexion establecida");</script>';
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}