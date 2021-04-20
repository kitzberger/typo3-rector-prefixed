<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\IndexedSearch\Domain\Repository\IndexSearchRepository::class)) {
    return;
}
final class IndexSearchRepository
{
    public const WILDCARD_LEFT = 'foo';
    public const WILDCARD_RIGHT = 'foo';
}
