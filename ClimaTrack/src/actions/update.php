<?php
session_start();

require_once '../db/connect.php';
require_once '../helpers/clear.php';
require_once '../api/index.php';
require_once '../helpers/handle_date.php';

// Verificar se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter o ID da cidade a ser atualizada e o novo nome da cidade
    $id = clear($_POST['update-id'] ?? '');
    $new_city_name = clear($_POST['city'] ?? '');

    // Validar os dados recebidos
    if (empty($id) || empty($new_city_name)) {
        $_SESSION["error_msg"] = "Dados insuficientes para atualização!";
        header('location: ../../index.php');
        exit;
    }

    // Obter os dados meteorológicos da nova cidade
    $weather_data = get_weather_data($new_city_name);

    // Verificar se a resposta da API é válida
    if ($weather_data === null) {
        $_SESSION["error_msg"] = "Erro ao conectar com a API!";
        header('location: ../../index.php');
        exit;
    }

    // Verificar se a cidade foi encontrada na API
    if (isset($weather_data["message"]) && strtolower($weather_data["message"]) === "city not found") {
        $_SESSION["error_msg"] = "CIDADE NÃO ENCONTRADA!";
        header('location: ../../index.php');
        exit;
    }

    // Verificar se os dados necessários estão presentes
    if (!isset($weather_data['name']) || !isset($weather_data['sys']['country'])) {
        $_SESSION["error_msg"] = "Dados incompletos da cidade!";
        header('location: ../../index.php');
        exit;
    }

    // Extrair as informações relevantes da resposta da API
    $name = clear($weather_data['name']);
    $country = clear($weather_data['sys']['country']);
    $temp = intval($weather_data['main']['temp']);
    $weather = clear($weather_data['weather'][0]['description']);
    $week_day = get_current_week_day();
    $date = get_current_date();
    $icon = clear($weather_data['weather'][0]['icon']);
    $pressure = intval($weather_data['main']['pressure']);
    $humidity = intval($weather_data['main']['humidity']);
    $wind = floatval($weather_data['wind']['speed']);
    $temp_max = intval($weather_data['main']['temp_max']);
    $temp_min = intval($weather_data['main']['temp_min']);
    $feels_like = intval($weather_data['main']['feels_like']);

    // Preparar a instrução SQL para atualizar os dados da cidade
    $sql = $pdo->prepare("
        UPDATE city 
        SET name = ?, country = ?, temp = ?, weather = ?, week_day = ?, date = ?, icon = ?, 
            pressure = ?, humidity = ?, wind = ?, temp_max = ?, temp_min = ?, feels_like = ? 
        WHERE id = ?
    ");

    // Executar a instrução SQL com os dados recebidos
    if ($sql->execute([
        $name, $country, $temp, $weather, $week_day, $date, $icon, 
        $pressure, $humidity, $wind, $temp_max, $temp_min, $feels_like, $id
    ])) {
        // Atualização bem-sucedida
        $_SESSION["success_msg"] = "Cidade atualizada com sucesso!";
    } else {
        // Verificar se o erro é devido a um registro duplicado
        if (strpos($sql->errorInfo()[2], "Duplicate") !== false) {
            $_SESSION["error_msg"] = "CIDADE JÁ CADASTRADA!";
        } else {
            $_SESSION["error_msg"] = "Erro ao atualizar a cidade!";
        }
    }

    // Redirecionar para a página principal
    header('location: ../../index.php');
    exit;
} else {
    // Acesso direto não permitido
    header('location: ../../index.php');
    exit;
}
?>
