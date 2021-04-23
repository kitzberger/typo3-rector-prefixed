<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_indexedsearch_indexer::class)) {
    return;
}
class tx_indexedsearch_indexer
{
}
\class_alias('tx_indexedsearch_indexer', 'tx_indexedsearch_indexer', \false);
