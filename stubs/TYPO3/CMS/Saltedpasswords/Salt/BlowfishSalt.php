<?php

declare (strict_types=1);
namespace TYPO3\CMS\Saltedpasswords\Salt;

if (\class_exists(\TYPO3\CMS\Saltedpasswords\Salt\BlowfishSalt::class)) {
    return;
}
class BlowfishSalt
{
}
