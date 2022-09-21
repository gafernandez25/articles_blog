<?php

namespace App;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if ($this->has($id)) {
            $entry = $this->entries[$id];

            return $entry($this);
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    public function set(string $id, callable $concrete)
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        $reflectionClass = new \ReflectionClass($id);

        if (!$reflectionClass->isInstantiable()) {
            throw new \Exception();
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        $dependencies = array_map(function (\ReflectionParameter $param) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new \Exception("Param name has no typehine");
            }

            if ($type instanceof \ReflectionUnionType) {
                throw new \Exception('invalid param');
            }

            if ($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }

            throw new \Exception('invalid param');
        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependencies);
    }
}