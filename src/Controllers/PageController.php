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
            'title' => 'Accueil - Blog MVC'
        ]);
    }

    /**
     * Affiche la page de contact.
     */
    public function contact(): void
    {
        $this->render('contact', [
            'title' => 'Contactez-nous'
        ]);
    }
}
