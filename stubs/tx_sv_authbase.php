<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_sv_authbase::class)) {
    return;
}
class tx_sv_authbase
{
}
\class_alias('tx_sv_authbase', 'tx_sv_authbase', \false);
