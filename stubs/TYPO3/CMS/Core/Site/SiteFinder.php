<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Site;

use TYPO3\CMS\Core\Site\Entity\Site;
if (\class_exists(\TYPO3\CMS\Core\Site\SiteFinder::class)) {
    return;
}
class SiteFinder
{
    public function getSiteByPageId(int $pageId, array $rootLine = null, string $mountPointParameter = null) : \TYPO3\CMS\Core\Site\Entity\Site
    {
        return new \TYPO3\CMS\Core\Site\Entity\Site();
    }
}
