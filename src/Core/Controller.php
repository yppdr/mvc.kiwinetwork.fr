<?php

namespace App\Core;

abstract class Controller
{
    /**
     * Affiche une vue en l'intégrant dans un layout principal.
     * @param string $view Le nom du fichier de vue (sans .php)
     * @param array $data Les données à transmettre à la vue
     */
    public function render(string $view, array $data = []): void
    {
        // Extrait les clés du tableau $data en variables
        // ex: ['title' => 'Mon Titre'] devient $title = 'Mon Titre'
        extract($data);

        // Démarre la temporisation de sortie. Rien n'est affiché à l'écran.
        ob_start();

        // Inclut le contenu de la vue.
        // Le chemin est relatif au dossier 'views'
        require_once __DIR__ . '/../../views/' . $view . '.php';

        // Récupère le contenu de la vue qui a été mis en mémoire tampon
        $content = ob_get_clean();

        // Inclut le layout principal, qui pourra utiliser la variable $content
        require_once __DIR__ . '/../../views/layouts/main.php';
    }
}
