<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_rsaauth_abstract_storage::class)) {
    return;
}
final class tx_rsaauth_abstract_storage
{
}
\class_alias('tx_rsaauth_abstract_storage', 'tx_rsaauth_abstract_storage', \false);
