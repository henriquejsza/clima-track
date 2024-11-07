<?php

// Função para converter os elementos de um array em inteiros
function parseInt(array $numbers): array
{
    // Usando a função array_map para aplicar intval a cada elemento do array
    return array_map('intval', $numbers);
}
