<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\tx_install_session::class)) {
    return;
}
final class tx_install_session
{
}
\class_alias('tx_install_session', 'tx_install_session', \false);
