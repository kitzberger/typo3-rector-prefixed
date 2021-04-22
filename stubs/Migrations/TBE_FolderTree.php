<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\TBE_FolderTree::class)) {
    return;
}
final class TBE_FolderTree
{
}
\class_alias('TBE_FolderTree', 'TBE_FolderTree', \false);
