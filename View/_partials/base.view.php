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
                <li><i class="fas fa-home"></i>Accueil</li>
                <li><i class="fas fa-book"></i>Recette</li>
                <li><i class="fas fa-list"></i>Catégories</li>
                <li><i class="fas fa-user"></i><a href="?controller=connexion">Connexion</a> </li>
            </ul>
        </div>

        <?= $html ?>
    </div>
</body>
</html>
