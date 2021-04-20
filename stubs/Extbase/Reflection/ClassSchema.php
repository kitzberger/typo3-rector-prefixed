<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\Reflection\ClassSchema::class)) {
    return;
}
final class ClassSchema
{
    public function getProperty($propertyName) : array
    {
        return [];
    }
    public function getTags() : array
    {
        return [];
    }
    public function getMethod($methodName) : array
    {
        return [];
    }
    public function hasMethod($methodName) : bool
    {
        return \false;
    }
    public function getProperties() : array
    {
        return [];
    }
}
