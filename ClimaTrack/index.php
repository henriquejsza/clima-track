<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ClimaTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="src/css/styles.css?<?= time() ?>" />
    <script defer src="src/js/script.js?<?= time() ?>"></script>
</head>
<body>
    <?php include "src/includes/message.php"; ?>
    <?php include "src/includes/search.php"; ?>
    
    <!-- Container para centralizar o filtro -->
    <div class="filter-container">
        <input class="filter" type="text" placeholder="Filtrar cidades">
    </div>
    
    <main class="container">
        <?php include "src/actions/read.php"; ?>
    </main>
    
    <?php include "src/includes/modal.php"; ?>
</body>
</html>