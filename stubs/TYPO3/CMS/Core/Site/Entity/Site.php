<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Site\Entity;

use TYPO3\CMS\Core\Routing\PageRouter;
if (\class_exists(\TYPO3\CMS\Core\Site\Entity\Site::class)) {
    return;
}
class Site
{
    public function getRouter() : \TYPO3\CMS\Core\Routing\PageRouter
    {
        return new \TYPO3\CMS\Core\Routing\PageRouter();
    }
}
