<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\TBE_PageTree::class)) {
    return;
}
class TBE_PageTree
{
}
\class_alias('TBE_PageTree', 'TBE_PageTree', \false);
