<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210409;

if (\class_exists('Typo3RectorPrefix20210409\\PHPExcel_Cell')) {
    return;
}
final class PHPExcel_Cell
{
}
\class_alias('Typo3RectorPrefix20210409\\PHPExcel_Cell', 'PHPExcel_Cell', \false);
