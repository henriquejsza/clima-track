<?php
require_once 'src/db/connect.php';
require_once 'src/helpers/insert_card.php';

// Preparar a consulta SQL para selecionar todas as cidades
$sql = $pdo->prepare("SELECT * FROM city");
$sql->execute();

// Obter todas as cidades da consulta
$cities = $sql->fetchAll();

// Verificar se existem cidades cadastradas
if (count($cities) > 0) {
    // Inverter a ordem das cidades
    $cities = array_reverse($cities);

    // Iterar sobre as cidades e processar cada uma
    foreach ($cities as $city) {
        // Inserir o cartão da cidade
        insert_card($city);
    }
} else {
    // Caso não existam cidades cadastradas, exibir mensagem
    echo '
    <div class="empty">
        <strong>Nenhuma cidade cadastrada!</strong>
    </div>
    ';
}
