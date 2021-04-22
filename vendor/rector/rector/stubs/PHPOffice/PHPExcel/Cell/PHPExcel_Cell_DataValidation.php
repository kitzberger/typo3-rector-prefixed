<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists('PHPExcel_Cell_DataValidation')) {
    return;
}
final class PHPExcel_Cell_DataValidation
{
}
\class_alias('PHPExcel_Cell_DataValidation', 'PHPExcel_Cell_DataValidation', \false);
