<?php

declare (strict_types=1);
namespace TYPO3\CMS\Version\Dependency;

if (\class_exists(\TYPO3\CMS\Version\Dependency\DependencyEntityFactory::class)) {
    return;
}
final class DependencyEntityFactory
{
}
