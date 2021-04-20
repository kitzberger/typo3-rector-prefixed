<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Core\Environment::class)) {
    return;
}
final class Environment
{
    public static function isCli() : bool
    {
        return \false;
    }
    public static function getProjectPath() : string
    {
        return '';
    }
    public static function isRunningOnCgiServer() : bool
    {
        return \false;
    }
    public static function getContext() : string
    {
        return 'foo';
    }
}
