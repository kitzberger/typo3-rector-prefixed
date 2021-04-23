<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_install_session::class)) {
    return;
}
class tx_install_session
{
}
\class_alias('tx_install_session', 'tx_install_session', \false);
