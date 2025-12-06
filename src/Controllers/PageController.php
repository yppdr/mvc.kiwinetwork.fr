<?php

namespace App\Controllers;

use App\Core\Controller;

define('CONTACT_EMAIL', 'site@kiwinetwork.fr');

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

                $to = CONTACT_EMAIL;
                $email_subject = "Nouveau message de contact : " . $subject;
                $email_body = "Vous avez reçu un nouveau message de contact.\n\n" .
                              "Nom: " . $name . "\n" .
                              "Email: " . $email . "\n" .
                              "Sujet: " . $subject . "\n\n" .
                              "Message:\n" . $message;
                $headers = "From: site@kiwinetwork.fr\r\n" .
                           "Reply-To: " . $email . "\r\n" .
                           "X-Mailer: PHP/" . phpversion();

                if (mail($to, $email_subject, $email_body, $headers)) {
                    $data['success'] = true;
                } else {
                    $data['errors'][] = 'Une erreur est survenue lors de l\'envoi de votre message.';
                }

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
