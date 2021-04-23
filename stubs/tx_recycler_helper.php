<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_recycler_helper::class)) {
    return;
}
class tx_recycler_helper
{
}
\class_alias('tx_recycler_helper', 'tx_recycler_helper', \false);
