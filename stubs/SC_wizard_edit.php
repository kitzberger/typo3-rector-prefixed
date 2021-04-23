<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_wizard_edit::class)) {
    return;
}
class SC_wizard_edit
{
}
\class_alias('SC_wizard_edit', 'SC_wizard_edit', \false);
