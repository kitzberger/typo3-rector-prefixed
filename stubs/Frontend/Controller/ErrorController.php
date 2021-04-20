<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Frontend\Controller\ErrorController::class)) {
    return;
}
final class ErrorController
{
    public function unavailableAction($request, string $message, array $reasons = []) : void
    {
    }
    public function pageNotFoundAction($request, string $message, array $reasons = []) : void
    {
    }
    public function accessDeniedAction($request, string $message, array $reasons = []) : void
    {
    }
}
