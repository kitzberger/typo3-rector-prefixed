<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Utility\CsvUtility::class)) {
    return;
}
final class CsvUtility
{
    public static function csvValues(array $row, $delim = ',', $quote = '"') : void
    {
    }
}
