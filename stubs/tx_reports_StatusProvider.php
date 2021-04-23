<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_reports_StatusProvider::class)) {
    return;
}
class tx_reports_StatusProvider
{
}
\class_alias('tx_reports_StatusProvider', 'tx_reports_StatusProvider', \false);
