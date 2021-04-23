<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_sv_auth::class)) {
    return;
}
class tx_sv_auth
{
}
\class_alias('tx_sv_auth', 'tx_sv_auth', \false);
