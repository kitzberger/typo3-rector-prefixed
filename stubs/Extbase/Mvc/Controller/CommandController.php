<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\Mvc\Controller\CommandController::class)) {
    return;
}
class CommandController
{
    protected function getBackendUserAuthentication() : void
    {
    }
}
