<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Backend\Controller\Page\LocalizationController::class)) {
    return;
}
final class LocalizationController
{
    public function getUsedLanguagesInPageAndColumn() : void
    {
    }
}
