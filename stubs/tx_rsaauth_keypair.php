<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_rsaauth_keypair::class)) {
    return;
}
class tx_rsaauth_keypair
{
}
\class_alias('tx_rsaauth_keypair', 'tx_rsaauth_keypair', \false);
