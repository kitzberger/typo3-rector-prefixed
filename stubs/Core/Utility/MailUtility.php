<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Utility\MailUtility::class)) {
    return;
}
final class MailUtility
{
    public static function parseAddresses($rawAddresses) : array
    {
        return [];
    }
}
