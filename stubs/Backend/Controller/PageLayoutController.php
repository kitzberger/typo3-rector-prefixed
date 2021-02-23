<?php

declare (strict_types=1);
namespace TYPO3\CMS\Backend\Controller;

use TYPO3\CMS\Backend\Template\ModuleTemplate;
if (\class_exists(\TYPO3\CMS\Backend\Controller\PageLayoutController::class)) {
    return;
}
final class PageLayoutController
{
    public function printContent() : void
    {
    }
    public function getModuleTemplate() : \TYPO3\CMS\Backend\Template\ModuleTemplate
    {
        return new \TYPO3\CMS\Backend\Template\ModuleTemplate();
    }
}
