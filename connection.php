<?php

$conn = new mysqli('localhost', 'root', '1234', 'php_mysql_iniciando');

if ($conn->connect_errno) {
    die('Falhou em conectar: (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

$sql = 'CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL
)';

if (!$conn->query($sql)) {
    echo 'Tabela users já existe';
}

echo '<br>';

// $result = $conn->query('INSERT INTO users (email) VALUE ("erik@erik.com")');

$result = $conn->query('SELECT * FROM users');

$users = $result->fetch_all(MYSQLI_ASSOC);

foreach ($users as $user) {
    echo $user['id'] . ' - ' . $user['email'] . '</br>';
}

echo '<pre>';
var_dump($users);
