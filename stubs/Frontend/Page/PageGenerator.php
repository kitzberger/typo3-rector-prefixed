<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Frontend\Page\PageGenerator::class)) {
    return;
}
final class PageGenerator
{
    public static function generatePageTitle() : void
    {
    }
}
