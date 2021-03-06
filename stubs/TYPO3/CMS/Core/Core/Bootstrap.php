<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Core;

use TYPO3\CMS\Core\Utility\GeneralUtility;
if (\class_exists(\TYPO3\CMS\Core\Core\Bootstrap::class)) {
    return;
}
class Bootstrap
{
    /**
     * @var Bootstrap
     */
    private static $instance;
    public static function getInstance() : self
    {
        self::$instance = new self();
        return self::$instance;
    }
    public static function usesComposerClassLoading() : void
    {
    }
    public static function initializeClassLoader($classLoader) : self
    {
        return self::$instance;
    }
    public function ensureClassLoadingInformationExists() : self
    {
        return self::$instance;
    }
    public function setRequestType(int $requestType = 0) : self
    {
        return self::$instance;
    }
    public function baseSetup() : void
    {
    }
}
