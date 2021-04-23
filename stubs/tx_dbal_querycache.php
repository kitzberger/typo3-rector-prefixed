<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_dbal_querycache::class)) {
    return;
}
class tx_dbal_querycache
{
}
\class_alias('tx_dbal_querycache', 'tx_dbal_querycache', \false);
