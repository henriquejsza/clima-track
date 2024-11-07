<?php

// Função para limpar dados de entrada, prevenindo possíveis vulnerabilidades
function clear($input)
{
    // Remover espaços em branco do início e final da string
    $data = trim($input);

    // Remover barras invertidas, se houver
    $data = stripslashes($data);

    // Converter caracteres especiais para entidades HTML
    $data = htmlspecialchars($data);

    return $data;
}
