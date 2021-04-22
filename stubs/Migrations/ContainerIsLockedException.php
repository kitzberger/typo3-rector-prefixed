<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Configuration\Exception;

if (\class_exists(\TYPO3\CMS\Extbase\Configuration\Exception\ContainerIsLockedException::class)) {
    return;
}
final class ContainerIsLockedException
{
}
