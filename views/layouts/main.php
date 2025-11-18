<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon Super Blog' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">
</head>
<body>
    <header>
        <h1><a href="<?= BASE_URL ?>">Mon Super Blog</a></h1>
        <nav>
            <a href="<?= BASE_URL ?>">Accueil</a>
            <a href="<?= BASE_URL ?>blog">Blog</a>
            <a href="<?= BASE_URL ?>contact">Contact</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="<?= BASE_URL ?>admin">Admin</a>
                <a href="<?= BASE_URL ?>logout">Déconnexion</a>
            <?php else: ?>
                <a href="<?= BASE_URL ?>admin">Admin</a>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <?php
        // C'est ici que le contenu de nos vues sera injecté
        echo $content ?? '';
        ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> - Mon Super Blog</p>
    </footer>
</body>
</html>
