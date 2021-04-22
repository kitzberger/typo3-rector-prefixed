<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Reflection\Exception;

if (\class_exists(\TYPO3\CMS\Extbase\Reflection\Exception\InvalidPropertyTypeException::class)) {
    return;
}
final class InvalidPropertyTypeException
{
}
