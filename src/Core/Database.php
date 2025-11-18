<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Gère la connexion à la base de données (Singleton).
 */
class Database
{
    private static ?PDO $instance = null;

    /**
     * Récupère l'instance unique de PDO.
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $config = require __DIR__ . '/../../config/database.php';
            
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
            
            try {
                self::$instance = new PDO(
                    $dsn,
                    $config['user'],
                    $config['password'],
                    [
                        // Affiche les erreurs SQL
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // Récupère les résultats sous forme d'objets anonymes (stdClass)
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    ]
                );
            } catch (PDOException $e) {
                // En cas d'échec de la connexion, on arrête tout.
                die('Erreur de connexion à la base de données: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
