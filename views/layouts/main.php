<?php use App\Core\FlashMessage; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KiwiNetwork - Services Informatiques Professionnels</title>

    <meta name="description" content="Découvrez nos services informatiques professionnels : dépannage à domicile, création de sites web sur mesure, installation de systèmes domotiques, hébergement sécurisé, VPN, et bien plus. Support technique 24/7 pour particuliers et entreprises.">
    <meta name="keywords" content="dépannage informatique, création site internet, installation domotique, hébergement web, infogérance, VPN, location IP, réseau informatique, formation informatique, conseils IT, Hébergement, Création de sites, Réparation informatique, Dépannage informatique, Infogérance, DSI, hebergement sur toulouse, hebergement sur montpellier, Création de sites sur toulouse">
    <meta name="author" content="KiwiNetwork">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="French">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://kiwinetwork.fr/">
    <meta property="og:title" content="KiwiNetwork - Services Informatiques Professionnels">
    <meta property="og:description" content="Dépannage, création de sites, domotique, hébergement, VPN. Support technique 24/7 pour particuliers et entreprises.">
    <meta property="og:image" content="<?= BASE_URL ?>assets/img/banner.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://kiwinetwork.fr/">
    <meta property="twitter:title" content="KiwiNetwork - Services Informatiques Professionnels">
    <meta property="twitter:description" content="Dépannage, création de sites, domotique, hébergement, VPN. Support technique 24/7 pour particuliers et entreprises.">
    <meta property="twitter:image" content="<?= BASE_URL ?>assets/img/banner.jpg">

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/logo.svg">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/app.css">
</head>
<body>

<header class="main-header">
    <div class="container">
        <a href="<?= BASE_URL ?>" class="logo"><img src="<?= BASE_URL ?>assets/img/logo.svg" alt="KiwiNetwork Logo"></a>
        <nav class="main-nav">
            <ul>
                <li><a href="<?= BASE_URL ?>" class="active">Accueil</a></li>
                <li><a href="<?= BASE_URL ?>blog">Blog</a></li>
                <li><a href="status.html">Status</a></li>
                <li><a href="<?= BASE_URL ?>contact">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="<?= BASE_URL ?>admin">Admin</a></li>
                    <li><a href="<?= BASE_URL ?>logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="<?= BASE_URL ?>admin">Admin</a></li>
                <?php endif; ?>

            </ul>
        </nav>
        <button class="mobile-toggle" aria-label="Ouvrir le menu">☰</button>
    </div>
</header>

<?php FlashMessage::display(); ?>

    <?php
    // C'est ici que le contenu de nos vues sera injecté
    echo $content ?? '';
    ?>



<footer class="main-footer">
    <div class="container">
        <p>&copy; <span id="copyright-year"><?= date('Y') ?></span> KiwiNetwork. Tous droits réservés.</p>
        <p><a href="<?= BASE_URL ?>mentions-legales.html">Mentions Légales</a></p>
    </div>
</footer>

<script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>
</html>
