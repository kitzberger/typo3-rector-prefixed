<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Context;

if (\class_exists(\TYPO3\CMS\Core\Context\Context::class)) {
    return;
}
class Context
{
    public function getPropertyFromAspect(string $name, string $property, $default = null) : void
    {
    }
    public function setAspect(string $name, \TYPO3\CMS\Core\Context\AspectInterface $aspect) : void
    {
    }
}
