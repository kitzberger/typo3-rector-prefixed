<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\TYPO3AJAX::class)) {
    return;
}
class TYPO3AJAX
{
}
\class_alias('TYPO3AJAX', 'TYPO3AJAX', \false);
