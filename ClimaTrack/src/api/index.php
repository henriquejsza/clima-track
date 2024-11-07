<?php
// Definir constantes de configuração
define('API_KEY', '13e0954c5a11e3b6ee791959e1ffcd09');
define('API_COUNTRY_URL', 'https://countryflagsapi.com/png/');
define('API_UNSPLASH', 'https://source.unsplash.com/1600x900/?city+');

// Função para obter dados meteorológicos de uma cidade
function get_weather_data($city)
{
    // URL da API para obter dados do clima
    $api_weather_url = 'https://api.openweathermap.org/data/2.5/weather?q=' . urlencode($city) . '&units=metric&appid=' . API_KEY . '&lang=pt_br';

    // Inicializar o cURL
    $curl = curl_init();

    // Configurar as opções do cURL
    curl_setopt_array($curl, [
        CURLOPT_URL => $api_weather_url,   // URL da API
        CURLOPT_RETURNTRANSFER => true,     // Retornar o resultado como string
        CURLOPT_CUSTOMREQUEST => 'GET',     // Método GET
    ]);

    // Executar a requisição cURL e obter a resposta
    $response = curl_exec($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);  // Código de status HTTP

    // Fechar a conexão cURL
    curl_close($curl);

    // Verificar se a resposta foi bem-sucedida (Código HTTP 200)
    if ($http_code !== 200) {
        // Logar o erro caso a requisição falhe
        error_log("Erro ao conectar com a API. Código HTTP: $http_code");
        return null;  // Retorna null se a requisição falhar
    }

    // Decodificar e retornar os dados JSON da resposta
    return json_decode($response, true);
}
