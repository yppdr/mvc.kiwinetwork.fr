<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Affiche la liste de tous les articles du blog.
     */
    public function index(): void
    {
        // Instancie le modèle Post pour interagir avec la table des articles
        $postModel = new Post();
        // Récupère tous les articles
        $posts = $postModel->findAll();

        // Appelle la méthode render pour afficher la vue
        $this->render('blog/index', [
            'title' => 'Tous les articles',
            'posts' => $posts,
        ]);
    }

    /**
     * Affiche un article spécifique par son slug.
     * @param array $params Les paramètres de l'URL (contient le slug)
     */
    public function show(array $params): void
    {
        $slug = $params['slug'] ?? null;

        $postModel = new Post();
        $post = $postModel->findBySlug($slug);

        // Si l'article n'est pas trouvé, on affiche une 404
        if (!$post) {
            http_response_code(404);
            $this->render('404');
            return;
        }

        $this->render('blog/show', [
            'title' => $post->title,
            'post' => $post,
        ]);
    }
}
