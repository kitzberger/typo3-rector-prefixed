<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Tx_Extbase_Domain_Model_Category::class)) {
    return;
}
class Tx_Extbase_Domain_Model_Category
{
}
\class_alias('Tx_Extbase_Domain_Model_Category', 'Tx_Extbase_Domain_Model_Category', \false);
