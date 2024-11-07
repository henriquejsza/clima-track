<?php
require_once 'src/api/index.php';

// Função para limpar o nome da cidade e transformá-lo em um formato adequado para a URL
function lapidate_city_name($name) {
    return str_replace(' ', '+', $name);
}

// Função para gerar o card de cidade com todos os dados necessários
function insert_card($city)
{
    // Usando HEREDOC para melhorar a legibilidade do HTML dentro do PHP
    $card = <<<HTML
<form action="./src/actions/delete.php" method="POST" class="card city">
    <div class="city-data">
        <main>
            <div class="city-name">
                <i class="fa-solid fa-location-dot"></i>
                <strong class="name">{$city['name']} - {$city['country']}</strong>
                <span class="date">{$city['date']}</span>
            </div>
            <div class="city-weather">
                <i class="fa-solid fa-temperature-low"></i>
                <strong class="temp">{$city['temp']}°C</strong>
                <div class="weather">
                    <span class="weather-name">{$city['weather']}</span>
                </div>
            </div>
        </main>
    </div>
    <div class="weather-data">
        <input type="hidden" id="delete-id" name="delete-id" value="{$city['id']}" />
        
        <dl class="weather-data-list">
            <div class="item">
                <dt>Pressão atmos. <i class="fa-solid fa-cloud"></i></dt>
                <dd>{$city['pressure']} hPa</dd>
            </div>
            <div class="item">
                <dt>Umidade <i class="fa-solid fa-droplet"></i></dt>
                <dd>{$city['humidity']} %</dd>
            </div>
            <div class="item">
                <dt>Vento <i class="fa-solid fa-wind"></i></dt>
                <dd>{$city['wind']} km/h</dd>
            </div>
        </dl>
        <ul class="weather-data-plus">
            <li class="item max">
                <i class="fa-solid fa-sun"></i>
                <div class="title">
                    <span>Máx.</span>
                    <i class="fa-solid fa-arrow-up"></i>
                </div>
                <strong>{$city['temp_max']}°C</strong>
            </li>
            <li class="item min">
                <i class="fa-solid fa-snowflake"></i>
                <div class="title">
                    <span>Min.</span>
                    <i class="fa-solid fa-arrow-down"></i>
                </div>
                <strong>{$city['temp_min']}°C</strong>
            </li>
            <li class="item feels">
                <i class="fa-solid fa-smog"></i>
                <div class="title">
                    <span>Sens. térmica</span>
                </div>
                <strong>{$city['feels_like']}°C</strong>
            </li>
        </ul>
        <button class="button change-city" type="button" value="{$city['id']}">
            <i class="fa-solid fa-location-crosshairs"></i>Mudar cidade
        </button>
        <button class="button delete-city" type="submit">
            Deletar card
        </button>
    </div>
</form>
HTML;

    // Exibir o card
    echo $card;
}
?>
