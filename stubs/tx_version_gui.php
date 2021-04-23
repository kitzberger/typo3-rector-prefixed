<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_version_gui::class)) {
    return;
}
class tx_version_gui
{
}
\class_alias('tx_version_gui', 'tx_version_gui', \false);
