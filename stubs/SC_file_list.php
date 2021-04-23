<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_file_list::class)) {
    return;
}
class SC_file_list
{
}
\class_alias('SC_file_list', 'SC_file_list', \false);
