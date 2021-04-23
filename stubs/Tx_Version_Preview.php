<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Version_Preview::class)) {
    return;
}
class Tx_Version_Preview
{
}
\class_alias('Tx_Version_Preview', 'Tx_Version_Preview', \false);
