<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_t3editor::class)) {
    return;
}
class tx_t3editor
{
}
\class_alias('tx_t3editor', 'tx_t3editor', \false);
