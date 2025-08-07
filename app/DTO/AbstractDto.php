<?php

namespace App\DTO;

use ReflectionClass;
use ReflectionNamedType;

abstract class AbstractDto
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }


    /**
     * @throws \ReflectionException
     */
    public static function fromArray(array $data): static
    {
        $reflection = new ReflectionClass(static::class);
        $params = $reflection->getConstructor()?->getParameters() ?? [];

        $args = [];

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();

            // Если значение отсутствует — используем значение по умолчанию (если есть)
            if (!array_key_exists($name, $data)) {
                if ($param->isDefaultValueAvailable()) {
                    $args[] = $param->getDefaultValue();
                } else {
                    $args[] = null;
                }
                continue;
            }

            // Если это DTO — вызываем fromArray рекурсивно
            if (
                $type instanceof ReflectionNamedType &&
                !$type->isBuiltin() &&
                is_array($data[$name]) &&
                is_subclass_of($type->getName(), AbstractDto::class)
            ) {
                $args[] = $type->getName()::fromArray($data[$name]);
            } else {
                $args[] = $data[$name];
            }
        }

        return $reflection->newInstanceArgs($args);
    }

    //пример fromArray
    //$dto = OrderDto::fromArray([
    //'customer_name' => 'John Doe',
    //'customer_email' => 'john@example.com',
    //'products' => [
    //['product_id' => 1, 'quantity' => 2],
    //['product_id' => 3, 'quantity' => 1],
    //],
    //]);
}
