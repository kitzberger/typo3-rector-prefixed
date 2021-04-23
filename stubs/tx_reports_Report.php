<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_reports_Report::class)) {
    return;
}
class tx_reports_Report
{
}
\class_alias('tx_reports_Report', 'tx_reports_Report', \false);
