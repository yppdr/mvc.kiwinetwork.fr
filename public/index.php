<?php

// --- Démarrage de la session ---
session_start();

// --- Affiche les erreurs pour le développement ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// --- Constante pour l'URL de base ---
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/');

// --- Autoloader simple PSR-4 pour notre namespace App ---
spl_autoload_register(function ($class) {
    // Projet de namespace racine
    $prefix = 'App\\';
    // Répertoire de base pour les fichiers de l'application
    $base_dir = __DIR__ . '/../src/';

    // Est-ce que la classe utilise le préfixe du namespace ?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // Non, on passe à l'autoloader suivant
        return;
    }

    // Récupère le nom de la classe relative (ex: Core\Router)
    $relative_class = substr($class, $len);

    // Remplace les séparateurs de namespace par des séparateurs de répertoire
    // et ajoute .php à la fin
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Si le fichier existe, on l'inclut
    if (file_exists($file)) {
        require $file;
    }
});


// --- Initialisation du routeur ---
$router = new App\Core\Router();

// --- Définition des routes ---
// add(URI, Controller, Méthode)
$router->add('', 'PageController', 'home');
$router->add('legal', 'PageController', 'legal');
$router->add('contact', 'PageController', 'contact');
$router->add('blog', 'BlogController', 'index');
$router->add('blog/{slug}', 'BlogController', 'show');

// Routes d'authentification
$router->add('login', 'LoginController', 'index');
$router->add('login/process', 'LoginController', 'processLogin');
$router->add('logout', 'LoginController', 'logout');

// Routes d'administration
$router->add('admin', 'AdminController', 'index');
$router->add('admin/posts/create', 'AdminController', 'create');
$router->add('admin/posts/store', 'AdminController', 'store');
$router->add('admin/posts/edit/{id}', 'AdminController', 'edit');
$router->add('admin/posts/update/{id}', 'AdminController', 'update');
$router->add('admin/posts/delete/{id}', 'AdminController', 'delete');

// --- Lancement du routeur ---
$router->dispatch();

