<?php
session_start();

require_once '../helpers/get_weather_data.php';

// Preparar a instrução SQL para inserção de dados na tabela city
$sql = $pdo->prepare("INSERT INTO city (name, country, temp, weather, week_day, date, icon, pressure, humidity, wind, temp_max, temp_min, feels_like) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Executar a instrução e verificar se a execução foi bem-sucedida
if (!$sql->execute([$name, $country, $temp, $weather, $week_day, $date, $icon, $pressure, $humidity, $wind, $temp_max, $temp_min, $feels_like])) {
    // Verificar se o erro foi causado por um registro duplicado
    if (strpos($sql->errorInfo()[2], "Duplicate") !== false) {
        $_SESSION["error_msg"] = "CIDADE JÁ CADASTRADA!";
    }
}

// Redirecionar para a página inicial
header('location: ../../index.php');
exit; // Certifique-se de chamar exit após o redirecionamento
