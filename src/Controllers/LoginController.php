<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\FlashMessage;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function index(): void
    {
        // Si l'utilisateur est déjà connecté, on le redirige vers l'admin
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
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
            $_SESSION['user_id'] = $user->id;
            FlashMessage::set('Connexion réussie. Bienvenue !');
            
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
        
        FlashMessage::set('Email ou mot de passe incorrect.', 'error');
        header('Location: ' . BASE_URL . 'login');
        exit;
    }

    /**
     * Gère la déconnexion de l'utilisateur.
     */
    public function logout(): void
    {
        session_destroy();
        // On redémarre une session pour pouvoir stocker le message flash
        session_start();
        FlashMessage::set('Vous avez été déconnecté avec succès.');
        header('Location: ' . BASE_URL);
        exit;
    }
}
