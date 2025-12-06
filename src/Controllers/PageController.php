<?php

namespace App\Controllers;

use App\Core\Controller;

class PageController extends Controller
{
    /**
     * Affiche la page d'accueil.
     */
    public function home(): void
    {
        $this->render('home', [
            'title' => 'Accueil - KiwiNetwork'
        ]);
    }

    /**
     * Affiche la page de contact et gère la soumission du formulaire.
     */
    public function contact(): void
    {
        $data = [
            'title' => 'Contactez-nous',
            'errors' => [],
            'success' => false,
            'form_data' => []
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');

            $data['form_data'] = $_POST;

            if (empty($name)) {
                $data['errors'][] = 'Le nom est obligatoire.';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['errors'][] = 'L\'adresse email n\'est pas valide.';
            }
            if (empty($subject)) {
                $data['errors'][] = 'Le sujet est obligatoire.';
            }
            if (empty($message)) {
                $data['errors'][] = 'Le message ne peut pas être vide.';
            }

            if (empty($data['errors'])) {

                // Setup send email ici

                $data['success'] = true;
            }
        }

        $this->render('contact', $data);
    }

    /**
     * Affiche la page de mentions légales
     */
    public function legal(): void
    {
        $this->render('legal', [
            'title' => 'Mentions légales - KiwiNetwork'
        ]);
    }

}
