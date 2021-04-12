<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210412\Symfony\Component\Mime;

if (\class_exists(\Typo3RectorPrefix20210412\Symfony\Component\Mime\Address::class)) {
    return;
}
final class Address
{
    public function __construct(string $address, string $name = '')
    {
    }
}
