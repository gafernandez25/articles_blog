<?php

namespace App;

class Router
{
    private array $routes;

    public function __construct(private \DI\Container $container)
    {
    }

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register("get", $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register("post", $route, $action);
    }

    public function put(string $route, callable|array $action): self
    {
        return $this->register("put", $route, $action);
    }

    public function delete(string $route, callable|array $action): self
    {
        return $this->register("delete", $route, $action);
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {
            throw new \Exception("Route not found");
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = $this->container->get($class);

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        throw new \Exception("Route not found");
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

}