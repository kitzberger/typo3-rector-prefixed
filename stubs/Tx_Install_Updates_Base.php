<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Install_Updates_Base::class)) {
    return;
}
class Tx_Install_Updates_Base
{
}
\class_alias('Tx_Install_Updates_Base', 'Tx_Install_Updates_Base', \false);
