<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_db_list::class)) {
    return;
}
final class SC_db_list
{
}
\class_alias('SC_db_list', 'SC_db_list', \false);
