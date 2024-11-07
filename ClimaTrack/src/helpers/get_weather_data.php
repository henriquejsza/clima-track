<?php
// Verificar se a sessão já foi iniciada antes de iniciar novamente
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir os arquivos necessários
include '../db/connect.php';
include '../helpers/clear.php';
include '../api/index.php';
include '../helpers/handle_date.php';

// Limpar e obter o nome da cidade enviado pelo formulário
$city = clear($_POST['city']);

// Obter os dados meteorológicos da cidade
$data = get_weather_data($city);

// Verificar se a resposta da API é válida
if ($data === null) {
    $_SESSION["error_msg"] = "Erro ao conectar com a API!";
    header('location: ../../index.php');
    exit(); // Garantir que o script pare após o redirecionamento
}

// Verificar se a cidade foi encontrada na API
if (isset($data["message"]) && $data["message"] == "city not found") {
    $_SESSION["error_msg"] = "CIDADE NÃO ENCONTRADA!";
    header('location: ../../index.php');
    exit(); // Garantir que o script pare após o redirecionamento
}

// Verificar se os dados da cidade foram recebidos corretamente
if (!isset($data['name'])) {
    $_SESSION["error_msg"] = "Erro ao obter dados da cidade!";
    header('location: ../../index.php');
    exit(); // Garantir que o script pare após o redirecionamento
}

// Extrair as informações relevantes da resposta da API
$name = $data['name'];
$country = $data['sys']['country'];
$temp = intval($data['main']['temp']);
$weather = $data['weather'][0]['description'];
$week_day = get_current_week_day();
$date = get_current_date();
$icon = $data['weather'][0]['icon'];
$pressure = intval($data['main']['pressure']);
$humidity = intval($data['main']['humidity']);
$wind = $data['wind']['speed'];
$temp_max = intval($data['main']['temp_max']);
$temp_min = intval($data['main']['temp_min']);
$feels_like = intval($data['main']['feels_like']);
