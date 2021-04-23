<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_install_report_InstallStatus::class)) {
    return;
}
class tx_install_report_InstallStatus
{
}
\class_alias('tx_install_report_InstallStatus', 'tx_install_report_InstallStatus', \false);
