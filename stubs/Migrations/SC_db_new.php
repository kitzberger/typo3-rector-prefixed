<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_db_new::class)) {
    return;
}
final class SC_db_new
{
}
\class_alias('SC_db_new', 'SC_db_new', \false);
