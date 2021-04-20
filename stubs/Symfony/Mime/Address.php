<?php

declare (strict_types=1);


if (\class_exists(\Symfony\Component\Mime\Address::class)) {
    return;
}
final class Address
{
    public function __construct(string $address, string $name = '')
    {
    }
}
