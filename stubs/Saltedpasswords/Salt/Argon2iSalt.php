<?php

declare (strict_types=1);


if (\class_exists(\TYPO3\CMS\Saltedpasswords\Salt\Argon2iSalt::class)) {
    return;
}
final class Argon2iSalt
{
}
