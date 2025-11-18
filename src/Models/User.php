<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Récupère un utilisateur par son email.
     * @param string $email
     * @return object|false L'objet utilisateur ou false s'il n'est pas trouvé.
     */
    public function findByEmail(string $email): object|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
