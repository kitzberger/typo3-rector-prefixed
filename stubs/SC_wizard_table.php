<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_wizard_table::class)) {
    return;
}
class SC_wizard_table
{
}
\class_alias('SC_wizard_table', 'SC_wizard_table', \false);
