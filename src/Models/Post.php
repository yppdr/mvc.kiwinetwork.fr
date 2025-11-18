<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Post
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Récupère tous les articles, triés par date de création décroissante.
     * @return array La liste des articles (sous forme d'objets)
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    /**
     * Récupère un article par son slug.
     * @param string $slug
     * @return object|false L'article trouvé ou false
     */
    public function findBySlug(string $slug): object|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    /**
     * Récupère un article par son ID.
     * @param int $id
     * @return object|false L'article trouvé ou false
     */
    public function findById(int $id): object|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Crée un nouvel article en base de données.
     * @param array $data Données contenant title, slug, et content
     * @return bool
     */
    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO posts (title, slug, content, img)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['content'],
            $data['img']
        ]);
    }

    /**
     * Met à jour un article en base de données.
     * @param int $id ID de l'article à mettre à jour
     * @param array $data Données contenant title, slug, et content
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE posts
            SET title = ?, slug = ?, content = ?, img = ?
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['title'],
            $data['slug'],
            $data['content'],
            $data['img'],
            $id
        ]);
    }

    /**
     * Supprime un article de la base de données.
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
