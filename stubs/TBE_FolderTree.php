<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\TBE_FolderTree::class)) {
    return;
}
class TBE_FolderTree
{
}
\class_alias('TBE_FolderTree', 'TBE_FolderTree', \false);
