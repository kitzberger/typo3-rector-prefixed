<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Core\Crypto\Random::class)) {
    return;
}
final class Random
{
    public function generateRandomBytes() : string
    {
        return 'bytes';
    }
    public function generateRandomHexString() : string
    {
        return 'hex';
    }
}
