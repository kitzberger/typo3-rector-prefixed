<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_saltedpasswords_salts_phpass::class)) {
    return;
}
class tx_saltedpasswords_salts_phpass
{
}
\class_alias('tx_saltedpasswords_salts_phpass', 'tx_saltedpasswords_salts_phpass', \false);
