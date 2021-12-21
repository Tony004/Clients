<?php
    $host = 'localhost';
    $db   = 'clients';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $tableName = "clients";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    // Создание таблицы
    $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS $tableName (id INTEGER AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150), surname VARCHAR(150), phone VARCHAR(50), comment TEXT, date DATETIME)");

?>
