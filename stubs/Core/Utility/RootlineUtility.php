<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Utility\RootlineUtility::class)) {
    return;
}
final class RootlineUtility
{
    public function __construct($uid, $mountPointParameter = '', $context = null)
    {
    }
    public function get() : array
    {
        return [];
    }
}
