<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Log;

if (\class_exists(\TYPO3\CMS\Core\Log\LogManager::class)) {
    return null;
}
class LogManager
{
    public function getLogger(string $class) : \TYPO3\CMS\Core\Log\Logger
    {
        return new \TYPO3\CMS\Core\Log\Logger();
    }
}
