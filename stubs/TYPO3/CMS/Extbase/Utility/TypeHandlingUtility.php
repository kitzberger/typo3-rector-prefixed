<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Utility;

if (\class_exists(\TYPO3\CMS\Extbase\Utility\TypeHandlingUtility::class)) {
    return;
}
class TypeHandlingUtility
{
    public static function hex2bin($hexadecimalData) : string
    {
        return 'foo';
    }
    public static function normalizeType($type) : void
    {
    }
    public static function isLiteral($type) : void
    {
    }
    public static function isSimpleType($type) : void
    {
    }
    public static function parseType($type) : void
    {
    }
}
