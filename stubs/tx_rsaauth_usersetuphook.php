<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_rsaauth_usersetuphook::class)) {
    return;
}
class tx_rsaauth_usersetuphook
{
}
\class_alias('tx_rsaauth_usersetuphook', 'tx_rsaauth_usersetuphook', \false);
