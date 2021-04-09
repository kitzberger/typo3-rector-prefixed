<?php

declare (strict_types=1);
namespace TYPO3\CMS\Backend\Controller\Page;

if (\class_exists(\TYPO3\CMS\Backend\Controller\Page\LocalizationController::class)) {
    return;
}
final class LocalizationController
{
    public function getUsedLanguagesInPageAndColumn() : void
    {
    }
}
