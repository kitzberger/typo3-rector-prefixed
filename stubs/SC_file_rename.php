<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_file_rename::class)) {
    return;
}
class SC_file_rename
{
}
\class_alias('SC_file_rename', 'SC_file_rename', \false);
