<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/de3d4c2e3d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <div id="container">
        <div id="navbar">
            <ul>
                <li><i class="fas fa-home"></i><a href="./index.php">Accueil</a></li>
                <li><i class="fas fa-book"></i><a href="?controller=recette">Recette</a></li>
                <li><i class="fas fa-utensils"></i>What's in my fridge ?</li>
                <li id="liAccount">
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo '<i class="fas fa-user"></i><a href="?controller=profile">'.$_SESSION['user']->getUsername().'</a>';
                            echo '<div id="subMenu"><a href="./deconnexion.php">Se déconnecter</a></div>';
                        }
                        else {
                            echo '<i class="fas fa-user"></i><a href="?controller=connexion">Connexion</a>';
                        }
                    ?>
                </li>
            </ul>
        </div>

        <?= $html ?>
        <div id="footer">
            <ul>
                <li>Mentions légales</li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
    <script src="assets/JS/app.js"></script>
</body>
</html>
