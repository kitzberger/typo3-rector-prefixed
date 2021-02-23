<?php

declare (strict_types=1);
namespace TYPO3\CMS\Frontend\Utility;

if (\class_exists(\TYPO3\CMS\Frontend\Utility\EidUtility::class)) {
    return;
}
final class EidUtility
{
    public static function initTCA() : void
    {
    }
    public static function connectDB() : void
    {
    }
}
