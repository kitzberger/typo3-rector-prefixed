<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

if (\class_exists('PHPExcel_Style_Conditional')) {
    return;
}
final class PHPExcel_Style_Conditional
{
}
\class_alias('PHPExcel_Style_Conditional', 'PHPExcel_Style_Conditional', \false);
