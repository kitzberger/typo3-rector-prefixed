<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\Mvc\Request::class)) {
    return;
}
final class Request
{
    public function getControllerExtensionName() : string
    {
        return 'extensionName';
    }
}
