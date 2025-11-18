<?php

// --- Script d'initialisation de la base de données ---
// À exécuter une seule fois (depuis le terminal ou le navigateur)

// On a besoin de nos classes
require_once __DIR__ . '/src/Core/Database.php';

echo "<pre>"; // Pour un affichage plus propre dans le navigateur

try {
    $pdo = App\Core\Database::getInstance();
    $config = require __DIR__ . '/config/database.php';
    echo "Connexion à la base de données MySQL '{$config['dbname']}' sur '{$config['host']}' réussie.\n";

    // Supprime la table si elle existe déjà pour repartir de zéro
    $pdo->exec("DROP TABLE IF EXISTS posts");
    echo "Ancienne table 'posts' supprimée (si elle existait).\n";

    // Crée la table posts
    $pdo->exec("
        CREATE TABLE posts (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            content TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table 'posts' créée avec succès.\n";

    // Insère quelques articles de démo
    $pdo->exec("
        INSERT INTO posts (title, slug, content) VALUES
        ('Premier article', 'premier-article', 'Contenu du tout premier article de notre blog.'),
        ('Un autre article', 'un-autre-article', 'Le contenu de cet article est aussi très intéressant.'),
        ('PHP c''est super', 'php-cest-super', 'Oui, vraiment, c''est un langage formidable pour apprendre le web.')
    ");
    echo "3 articles de démo insérés avec succès.\n";

    // --- Table des utilisateurs ---
    $pdo->exec("DROP TABLE IF EXISTS users");
    echo "Ancienne table 'users' supprimée (si elle existait).\n";

    $pdo->exec("
        CREATE TABLE users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    echo "Table 'users' créée avec succès.\n";

    // Mot de passe pour 'password'
    $hashedPassword = password_hash('testpassword', PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->execute(['admin@example.com', $hashedPassword]);
    echo "Utilisateur admin par défaut ('admin@example.com' / 'password') créé.\n";

    echo "\n--- Initialisation terminée ! ---";

} catch (PDOException $e) {
    die("ERREUR : " . $e->getMessage() . "\n");
}

echo "</pre>";



