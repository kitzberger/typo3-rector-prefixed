<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Backend\Template\ModuleTemplate::class)) {
    return;
}
final class ModuleTemplate
{
    public function loadJavascriptLib($lib) : void
    {
    }
    public function renderContent() : void
    {
    }
}
