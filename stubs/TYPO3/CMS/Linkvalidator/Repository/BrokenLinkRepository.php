<?php

declare (strict_types=1);
namespace TYPO3\CMS\Linkvalidator\Repository;

if (\class_exists(\TYPO3\CMS\Linkvalidator\Repository\BrokenLinkRepository::class)) {
    return;
}
class BrokenLinkRepository
{
    public function getNumberOfBrokenLinks(string $linkTarget) : int
    {
        return 1;
    }
    public function isLinkTargetBrokenLink(string $linkTarget) : bool
    {
        return \true;
    }
}
