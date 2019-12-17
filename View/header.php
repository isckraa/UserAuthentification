<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>EcoSphere - Shop</title>
    <meta name="viewport" content="width=device-width">
    <link href="View/style/general.css" rel="stylesheet" type="text/css">
    <link href="View/style/header-footer.css" rel="stylesheet" type="text/css">
    <link href="View/style/mainSection.css" rel="stylesheet" type="text/css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Nunito|Glegoo" rel="stylesheet">
    <!-- Fontawesome -->
    <script src="./View/js/fontawesome-all.min.js"></script>
    <!-- Icon -->
    <link href="./View/img/icon.png" rel="icon">
</head>

<body>

    <header>
        <div id="info-bar">
            <p>My wonderful platform</p>
        </div>

        <div id="banner-bloc">
            <h1>TP Authentification et MVC</h1>
        </div>

        <div id="account_bar">

            <?php
            //var_dump($_SESSION['user']);
            if (!empty($_SESSION['user']) && isset($_SESSION['user'])) {
                echo '<div class="user">';
                echo '<h2>Bonjour' . $_SESSION['user']['firstName'] . '</h2>';
                echo '<a href="./index.php?ctrl=user&action=logout">Déconnection</a>';
                echo '</div>';
            } else {
                echo '<div class="connection center">';
                echo '<a href="./index.php?ctrl=user&action=login" class="no-deco" title="Login or create account">';
                echo '<i class="fas fa-user"></i>';
                echo '<div class="text">Login</div>';
                echo '</a>';
                echo '</div>';
            }
            ?>
        </div>

        <ul id="menu_bar">
            <a href="./index.php?ctrl=User&action=usersList" class="no-deco">
                <li>Liste des utilisateurs</li>
            </a>
            <a href="./" class="no-deco">
                <li>Le mémoire</li>
            </a>
            <a href="./" class="no-deco">
                <li>La soutenance</li>
            </a>
            <a href="./" class="no-deco">
                <li>Le carnet de liaison</li>
            </a>
            <a href="./" class="no-deco">
                <li>Les espaces de travail</li>
            </a>
        </ul>
    </header>