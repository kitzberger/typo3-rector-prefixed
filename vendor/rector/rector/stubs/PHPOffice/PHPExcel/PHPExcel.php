<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

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
\class_alias('PHPExcel', 'PHPExcel', \false);
