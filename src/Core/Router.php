<?php

namespace App\Core;

class Router
{
    protected array $routes = [];

    /**
     * Ajoute une route au routeur.
     * @param string $uri L'URI de la route (ex: 'contact')
     * @param string $controller Le nom du contrôleur (ex: 'PageController')
     * @param string $method La méthode à appeler dans le contrôleur (ex: 'contact')
     */
    public function add(string $uri, string $controller, string $method): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
        ];
    }

    /**
     * Cherche la route correspondante à l'URI et appelle le contrôleur.
     */
    public function dispatch(): void
    {
        $uri = $_GET['url'] ?? '';
        $uri = trim($uri, '/');

        foreach ($this->routes as $route) {
            // Convertit la route en une expression régulière
            // Exemple: 'blog/{slug}' devient '#^blog/(?P<slug>[a-zA-Z0-9-]+)$#'
            $pattern = preg_replace('/\{([a-z]+)\}/', '(?P<$1>[a-zA-Z0-9-]+)', $route['uri']);
            $pattern = '#^' . $pattern . '$#';

            // Vérifie si l'URI actuelle correspond au pattern de la route
            if (preg_match($pattern, $uri, $matches)) {
                // Extrait les paramètres (ex: ['slug' => 'premier-article'])
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $controllerName = "App\\Controllers\\{$route['controller']}";
                
                $controller = new $controllerName();
                $method = $route['method'];
                
                // Appelle la méthode du contrôleur avec les paramètres
                $controller->$method($params);
                return;
            }
        }

        // Si aucune route n'est trouvée
        http_response_code(404);
        require_once '../views/404.php';
    }
}
