<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists('PHPExcel_CalcEngine_Logger')) {
    return;
}
final class PHPExcel_CalcEngine_Logger
{
}
\class_alias('PHPExcel_CalcEngine_Logger', 'PHPExcel_CalcEngine_Logger', \false);
