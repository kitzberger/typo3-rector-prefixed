<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Resource\Processing\LocalImageProcessor::class)) {
    return;
}
final class LocalImageProcessor
{
    public function getTemporaryImageWithText(string $filename, string $textline1, string $textline2, string $textline3) : string
    {
        return 'foo';
    }
}
