<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Localization\LanguageService::class)) {
    return;
}
final class LanguageService
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
