<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_rsaauth_abstract_storage::class)) {
    return;
}
class tx_rsaauth_abstract_storage
{
}
\class_alias('tx_rsaauth_abstract_storage', 'tx_rsaauth_abstract_storage', \false);
