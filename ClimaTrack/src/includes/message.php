<?php
if (isset($_SESSION["error_msg"])) {
    // Escapar a mensagem para evitar XSS
    $error_msg = htmlspecialchars($_SESSION["error_msg"], ENT_QUOTES, 'UTF-8');
    echo '
      <script>
        alert("' . $error_msg . '");
      </script>
    ';
    // Limpar a mensagem após exibição
    unset($_SESSION["error_msg"]);
}

// Destruir a sessão completamente, caso necessário
session_destroy();
?>
