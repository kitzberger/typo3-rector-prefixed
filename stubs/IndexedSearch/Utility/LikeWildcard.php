<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\IndexedSearch\Utility\LikeWildcard::class)) {
    return;
}
final class LikeWildcard
{
    public const WILDCARD_LEFT = 'foo';
    public const WILDCARD_RIGHT = 'foo';
}
