<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

if (\class_exists('Typo3RectorPrefix20210409\\PHPExcel_Cell_DataValidation')) {
    return;
}
final class PHPExcel_Cell_DataValidation
{
}
\class_alias('Typo3RectorPrefix20210409\\PHPExcel_Cell_DataValidation', 'PHPExcel_Cell_DataValidation', \false);