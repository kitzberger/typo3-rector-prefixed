<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210420;

if (\class_exists('PHPExcel_Cell')) {
    return;
}
final class PHPExcel_Cell
{
}
\class_alias('PHPExcel_Cell', 'PHPExcel_Cell', \false);
