<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210413;

if (\class_exists('Typo3RectorPrefix20210413\\PHPExcel_CalcEngine_Logger')) {
    return;
}
final class PHPExcel_CalcEngine_Logger
{
}
\class_alias('Typo3RectorPrefix20210413\\PHPExcel_CalcEngine_Logger', 'PHPExcel_CalcEngine_Logger', \false);
