<?php
function insert_card($city)
{
    // Exibe o cartão da cidade com todos os dados meteorológicos
    echo '
    <div class="card city">
        <div class="card-content">
            <div class="city-name">
                <strong class="name">' . htmlspecialchars($city['name']) . ', ' . htmlspecialchars($city['country']) . '</strong>
                <span class="date">' . date('d M Y') . '</span>
            </div>

            <div class="temperature">
                <strong class="temp">' . htmlspecialchars($city['temp']) . '°</strong>
                <span class="weather-name">' . htmlspecialchars($city['weather']) . '</span>
            </div>

            <div class="weather-details">
                <div class="detail">
                    <span class="label">Pressão</span>
                    <span class="value">' . htmlspecialchars($city['pressure']) . ' hPa</span>
                </div>
                <div class="detail">
                    <span class="label">Umidade</span>
                    <span class="value">' . htmlspecialchars($city['humidity']) . '%</span>
                </div>
                <div class="detail">
                    <span class="label">Vento</span>
                    <span class="value">' . htmlspecialchars($city['wind']) . ' km/h</span>
                </div>
            </div>

            <div class="temp-range">
                <div class="temp-item">
                    <span class="label">Máx</span>
                    <span class="value">' . htmlspecialchars($city['temp_max']) . '°</span>
                </div>
                <div class="temp-item">
                    <span class="label">Mín</span>
                    <span class="value">' . htmlspecialchars($city['temp_min']) . '°</span>
                </div>
                <div class="temp-item">
                    <span class="label">Sensação</span>
                    <span class="value">' . htmlspecialchars($city['feels_like']) . '°</span>
                </div>
            </div>
        </div>

        <div class="card-actions">
            <button class="button change-city" type="button" value="' . htmlspecialchars($city['id']) . '">
                Atualizar
            </button>

            <form action="./src/actions/delete.php" method="POST" class="delete-form">
                <input type="hidden" name="delete-id" value="' . htmlspecialchars($city['id']) . '" />
                <button type="submit" class="delete-city">
                    Excluir
                </button>
            </form>
        </div>
    </div>
    ';
}
?>
