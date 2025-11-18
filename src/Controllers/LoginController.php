<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function index(): void
    {
        $this->render('login/index', ['title' => 'Connexion']);
    }

    /**
     * Traite la tentative de connexion.
     */
    public function processLogin(): void
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';


        $userModel = new User();
        $user = $userModel->findByEmail($email);

                // Si l'utilisateur existe et que le mot de passe est correct
                if ($user && password_verify($password, $user->password)) {
                    // La session est déjà démarrée dans public/index.php
                    $_SESSION['user_id'] = $user->id;
                    
                    // On redirige vers l'administration
                    header('Location: ' . BASE_URL . 'admin');
                    exit;
                }
        // Sinon, on redirige vers la page de connexion (avec un message d'erreur bientôt)
        header('Location: ' . BASE_URL . 'login');
        exit;
    }

    /**
     * Gère la déconnexion de l'utilisateur.
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
        exit;
    }
}
