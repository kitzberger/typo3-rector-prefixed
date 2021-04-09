<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Database\Query\Restriction;

if (\class_exists(\TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction::class)) {
    return;
}
final class DeletedRestriction
{
}
