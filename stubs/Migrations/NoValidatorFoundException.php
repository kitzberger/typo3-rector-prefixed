<?php

declare (strict_types=1);
namespace TYPO3\CMS\Extbase\Validation\Exception;

if (\class_exists(\TYPO3\CMS\Extbase\Validation\Exception\NoValidatorFoundException::class)) {
    return;
}
final class NoValidatorFoundException
{
}
