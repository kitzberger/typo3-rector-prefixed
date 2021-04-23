<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\TYPO3backend::class)) {
    return;
}
class TYPO3backend
{
}
\class_alias('TYPO3backend', 'TYPO3backend', \false);
