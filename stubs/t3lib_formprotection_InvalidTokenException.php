<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_formprotection_InvalidTokenException::class)) {
    return;
}
class t3lib_formprotection_InvalidTokenException
{
}
\class_alias('t3lib_formprotection_InvalidTokenException', 't3lib_formprotection_InvalidTokenException', \false);
