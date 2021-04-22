<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Object\Container\Exception;

if (\class_exists(\TYPO3\CMS\Extbase\Object\Container\Exception\CannotInitializeCacheException::class)) {
    return;
}
final class CannotInitializeCacheException
{
}
