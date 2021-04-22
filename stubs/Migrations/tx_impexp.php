<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_impexp::class)) {
    return;
}
final class tx_impexp
{
}
\class_alias('tx_impexp', 'tx_impexp', \false);
