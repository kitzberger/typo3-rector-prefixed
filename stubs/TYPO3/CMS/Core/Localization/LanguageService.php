<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Localization;

if (\class_exists(\TYPO3\CMS\Core\Localization\LanguageService::class)) {
    return;
}
class LanguageService
{
    public function init(string $language) : void
    {
    }
    public function sL($input) : void
    {
    }
    public function getLL($index) : void
    {
    }
    public function getLLL($index, $localLanguage) : void
    {
    }
}
