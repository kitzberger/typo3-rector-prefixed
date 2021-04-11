<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Reporting;

use Ssch\TYPO3Rector\Reporting\ValueObject\Report;
final class NullReporter implements \Ssch\TYPO3Rector\Reporting\Reporter
{
    public function report(\Ssch\TYPO3Rector\Reporting\ValueObject\Report $report) : void
    {
    }
}
