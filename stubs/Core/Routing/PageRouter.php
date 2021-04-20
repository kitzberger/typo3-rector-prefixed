<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Routing\PageRouter::class)) {
    return;
}
final class PageRouter
{
    public function generateUri(int $uid) : string
    {
        return 'foo';
    }
}
