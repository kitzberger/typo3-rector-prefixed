<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210415;

// @see: https://github.com/PHPOffice/PHPExcel/blob/1.8/Classes/PHPExcel.php
final class PHPExcel
{
    /**
     * @return PHPExcel_Worksheet
     */
    public function setActiveSheetIndex($pIndex = 0)
    {
    }
}
// @see: https://github.com/PHPOffice/PHPExcel/blob/1.8/Classes/PHPExcel.php
\class_alias('Typo3RectorPrefix20210415\\PHPExcel', 'PHPExcel', \false);
