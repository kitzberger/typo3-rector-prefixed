<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Core\ClassLoadingInformation::class)) {
    return;
}
final class ClassLoadingInformation
{
    public static function setClassLoader($classLoader)
    {
    }
    public static function isClassLoadingInformationAvailable() : bool
    {
        return \true;
    }
    public static function registerClassLoadingInformation()
    {
    }
}
