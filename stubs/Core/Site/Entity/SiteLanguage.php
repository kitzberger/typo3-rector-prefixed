<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Site\Entity\SiteLanguage::class)) {
    return;
}
final class SiteLanguage
{
    public function getTwoLetterIsoCode() : string
    {
        return 'ch';
    }
}
