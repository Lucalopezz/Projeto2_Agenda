<?php 

    include_once("config/url.php");
    include_once("config/process.php");

    //limpa a msg
    if (isset($_SESSION['msg'])) {
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenta de Contatos</title>

    <link rel="shortcut icon" href="<?= $BASE_URL?>img/logo.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= $BASE_URL?>css/style.css">
    
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?= $BASE_URL?>">
            <img src="<?= $BASE_URL?>img/logo.svg" alt="">
        </a>
        <div>
            <div class="navbar-nav">
                <a href="<?= $BASE_URL?>index.php" id="homeLink" class="nav-link active">Agenda</a>
                <a class="nav-link active" href="<?= $BASE_URL?>create.php">Adicionar contato</a>
            </div>
        </div>
    </nav>
</header>