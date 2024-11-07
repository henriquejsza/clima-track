<?php
require_once '../db/connect.php';

// Preparar a instrução SQL para deletar todos os registros da tabela city
$sql = $pdo->prepare("DELETE FROM city");

// Tentar executar a instrução SQL
if (!$sql->execute()) {
    // Verificar se o erro é relacionado a um problema interno no sistema
    $errorMessage = $sql->errorInfo()[2];
    if (strpos($errorMessage, "Error") !== false) {
        $_SESSION["error_msg"] = "PROBLEMA INTERNO NO SISTEMA";
    }
}

// Redirecionar para a página inicial
header('location: ../../index.php');
exit; // Garantir que o script pare após o redirecionamento
