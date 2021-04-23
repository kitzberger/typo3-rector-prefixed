<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_indexedsearch_crawler::class)) {
    return;
}
class tx_indexedsearch_crawler
{
}
\class_alias('tx_indexedsearch_crawler', 'tx_indexedsearch_crawler', \false);
