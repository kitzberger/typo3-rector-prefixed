<?php

declare (strict_types=1);
namespace TYPO3\CMS\Saltedpasswords\Salt;

if (\class_exists(\TYPO3\CMS\Saltedpasswords\Salt\Pbkdf2Salt::class)) {
    return;
}
final class Pbkdf2Salt
{
}
