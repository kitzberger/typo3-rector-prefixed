<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_wizard_list::class)) {
    return;
}
final class SC_wizard_list
{
}
\class_alias('SC_wizard_list', 'SC_wizard_list', \false);
