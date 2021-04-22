<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Localization;

use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
if (\class_exists(\TYPO3\CMS\Core\Localization\Locales::class)) {
    return;
}
final class Locales
{
    public static function setSystemLocaleFromSiteLanguage(\TYPO3\CMS\Core\Site\Entity\SiteLanguage $siteLanguage) : void
    {
    }
    public function getPreferredClientLanguage($languageCodesList) : string
    {
        return 'foo';
    }
}
