<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Security\Exception;

if (\class_exists(\TYPO3\CMS\Extbase\Security\Exception\SyntacticallyWrongRequestHashException::class)) {
    return;
}
final class SyntacticallyWrongRequestHashException
{
}
