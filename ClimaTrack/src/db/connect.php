<?php
// Definindo as configurações do banco de dados
$dbname = "crud-weather-php";
$host = "localhost";
$user = "root";
$password = "henriquejsza1346";

try {
    // Estabelecendo a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Configurando o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Exibindo a mensagem de erro caso a conexão falhe
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
