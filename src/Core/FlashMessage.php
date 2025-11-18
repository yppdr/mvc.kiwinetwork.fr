<?php

namespace App\Core;

class FlashMessage
{
    /**
     * Définit un message flash en session.
     *
     * @param string $message Le message à afficher.
     * @param string $type Le type de message (success, error, warning, info).
     */
    public static function set(string $message, string $type = 'success'): void
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type,
        ];
    }

    /**
     * Affiche le message flash s'il existe et le supprime.
     */
    public static function display(): void
    {
        if (isset($_SESSION['flash'])) {
            $message = $_SESSION['flash']['message'];
            $type = $_SESSION['flash']['type'];
            unset($_SESSION['flash']);

            // Adaptez les classes CSS à votre framework (ex: Bootstrap)
            $class = '';
            switch ($type) {
                case 'success':
                    $class = 'alert alert-success';
                    break;
                case 'error':
                    $class = 'alert alert-danger';
                    break;
                case 'warning':
                    $class = 'alert alert-warning';
                    break;
                case 'info':
                    $class = 'alert alert-info';
                    break;
                default:
                    $class = 'alert alert-secondary';
                    break;
            }

            echo "<div class=\"{$class}\" role=\"alert\">" . htmlspecialchars($message) . "</div>";
        }
    }
}
