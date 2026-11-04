
<?php

class Router
{
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        foreach ($this->routes[$method] ?? [] as $path => [$class, $action]) {

            $pattern = '#^' . preg_replace(
                '#\{(\w+)\}#',
                '(?<$1>[^/]+)',
                $path
            ) . '$#';

            if (preg_match($pattern, $uri, $matches)) {

                $params = array_filter(
                    $matches,
                    'is_string',
                    ARRAY_FILTER_USE_KEY
                );

                (new $class())->$action(...$params);
                return;
            }
        }

        http_response_code(404);
        echo "Página no encontrada";
    }
}

