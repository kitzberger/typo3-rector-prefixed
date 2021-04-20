<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Context\Context::class)) {
    return;
}
final class Context
{
    public function getPropertyFromAspect(string $name, string $property, $default = null) : void
    {
    }
    public function setAspect(string $name, \TYPO3\CMS\Core\Context\AspectInterface $aspect) : void
    {
    }
}
