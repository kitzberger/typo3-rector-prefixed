<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_rsaauth_keypair::class)) {
    return;
}
final class tx_rsaauth_keypair
{
}
\class_alias('tx_rsaauth_keypair', 'tx_rsaauth_keypair', \false);
