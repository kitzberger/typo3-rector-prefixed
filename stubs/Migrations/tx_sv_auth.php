<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_sv_auth::class)) {
    return;
}
final class tx_sv_auth
{
}
\class_alias('tx_sv_auth', 'tx_sv_auth', \false);
