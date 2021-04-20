<?php

declare (strict_types=1);


use TYPO3\CMS\Core\Page\PageRenderer;
if (\class_exists(\TYPO3\CMS\Backend\Controller\BackendController::class)) {
    return;
}
final class BackendController
{
    public function getPageRenderer() : \TYPO3\CMS\Core\Page\PageRenderer
    {
        return new \TYPO3\CMS\Core\Page\PageRenderer();
    }
}
