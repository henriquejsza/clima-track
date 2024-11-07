<?php

// Função para obter a data atual formatada
function get_current_date()
{
    // Definir o local para exibição da data em português
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    // Definir o fuso horário
    date_default_timezone_set('America/Sao_Paulo');
    // Obter a data no formato 'dia de mês de ano', como exemplo: '05 de novembro de 2024'
    $current_date = strftime("%d de %B de %Y", strtotime('today'));
    return $current_date;
}

// Função para obter o nome do dia da semana atual
function get_current_week_day()
{
    // Array com os nomes dos dias da semana em português
    $week_days = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
    // Obter o número do dia da semana (0 = Domingo, 6 = Sábado)
    $current_week_day_number = date('w');
    // Retornar o nome do dia da semana baseado no número
    $current_week_day = $week_days[$current_week_day_number];
    return $current_week_day;
}

?>
