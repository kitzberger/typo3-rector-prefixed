<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Utility;

if (\class_exists(\TYPO3\CMS\Core\Utility\ArrayUtility::class)) {
    return;
}
class ArrayUtility
{
    public static function mergeRecursiveWithOverrule(array &$original, array $overrule, $addKeys = \true, $includeEmptyValues = \true, $enableUnsetFeature = \true) : void
    {
    }
    public static function getValueByPath() : void
    {
    }
    public static function setValueByPath() : void
    {
    }
    public static function removeByPath() : void
    {
    }
    public static function sortArrayWithIntegerKeys() : void
    {
    }
    public static function inArray(array $in_array, $item) : bool
    {
        return \true;
    }
}
