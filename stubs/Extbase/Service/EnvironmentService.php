<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Extbase\Service\EnvironmentService::class)) {
    return;
}
class EnvironmentService
{
    public function isEnvironmentInCliMode() : string
    {
        return 'foo';
    }
}
