<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_wizard_list::class)) {
    return;
}
class SC_wizard_list
{
}
\class_alias('SC_wizard_list', 'SC_wizard_list', \false);
