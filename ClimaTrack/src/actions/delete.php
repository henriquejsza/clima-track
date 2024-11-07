<?php
require_once '../db/connect.php';

// Obter o ID da cidade a ser deletada do formulário
$id = $_POST['delete-id'];

// Preparar a instrução SQL para deletar a cidade com o ID especificado
$sql = $pdo->prepare("DELETE FROM city WHERE id = ?");

// Tentar executar a instrução SQL
if (!$sql->execute([$id])) {
    // Exibir o erro, caso a execução falhe
    print_r($sql->errorInfo());
}

// Redirecionar para a página inicial
header('location: ../../index.php');
exit; // Garantir que o script pare após o redirecionamento
