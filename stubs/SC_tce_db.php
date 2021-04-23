<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_tce_db::class)) {
    return;
}
class SC_tce_db
{
}
\class_alias('SC_tce_db', 'SC_tce_db', \false);
