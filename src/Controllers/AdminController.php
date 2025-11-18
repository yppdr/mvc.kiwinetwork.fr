<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'login');
            exit;
        }
    }

    /**
     * Affiche la page principale de l'administration (liste des articles).
     */
    public function index(): void
    {
        $postModel = new Post();
        $posts = $postModel->findAll();

        $this->render('admin/index', [
            'title' => 'Administration',
            'posts' => $posts,
        ]);
    }

    /**
     * Affiche le formulaire de création d'un article.
     */
    public function create(): void
    {
        $this->render('admin/create', [
            'title' => 'Créer un nouvel article'
        ]);
    }

    /**
     * Enregistre un nouvel article en base de données.
     */
    public function store(): void
    {
        $title = $_POST['title'] ?? '';
        $img = $_POST['img'] ?? '';
        $content = $_POST['content'] ?? '';

        // Validation simple
        if (empty($title) || empty($content)) {
            // Gérer l'erreur, peut-être avec une session flash
            header('Location: ' . BASE_URL . 'admin/posts/create');
            exit;
        }

        $postModel = new Post();
        $postModel->create([
            'title' => $title,
            'slug' => $this->slugify($title),
            'content' => $content,
            'img' => $img,
        ]);

        // Redirection vers la liste des articles
        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    /**
     * Affiche le formulaire d'édition d'un article.
     * @param array $params
     */
    public function edit(array $params): void
    {
        $id = (int)($params['id'] ?? 0);
        $postModel = new Post();
        $post = $postModel->findById($id);

        if (!$post) {
            http_response_code(404);
            $this->render('404');
            return;
        }

        $this->render('admin/edit', [
            'title' => 'Modifier l\'article',
            'post' => $post,
        ]);
    }

    /**
     * Met à jour un article en base de données.
     * @param array $params
     */
    public function update(array $params): void
    {
        $id = (int)($params['id'] ?? 0);
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $img = $_POST['img'] ?? '';

        if (empty($title) || empty($content) || $id === 0) {
            // Gérer l'erreur
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }

        $postModel = new Post();
        $postModel->update($id, [
            'title' => $title,
            'slug' => $this->slugify($title),
            'content' => $content,
            'img' => $img,
        ]);

        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    /**
     * Supprime un article.
     * @param array $params
     */
    public function delete(array $params): void
    {
        $id = (int)($params['id'] ?? 0);

        if ($id > 0) {
            $postModel = new Post();
            $postModel->delete($id);
        }

        header('Location: ' . BASE_URL . 'admin');
        exit;
    }

    /**
     * Génère un slug à partir d'une chaîne de caractères.
     * @param string $text
     * @return string
     */
    private function slugify(string $text): string
    {
        // Remplace les caractères non-alphanumériques par des tirets
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Translittère
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Supprime les caractères non désirés
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Met en minuscule
        $text = strtolower(trim($text, '-'));
        // Supprime les tirets dupliqués
        $text = preg_replace('~-+~', '-', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
