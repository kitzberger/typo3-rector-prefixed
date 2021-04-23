<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_saltedpasswords_abstract_salts::class)) {
    return;
}
class tx_saltedpasswords_abstract_salts
{
}
\class_alias('tx_saltedpasswords_abstract_salts', 'tx_saltedpasswords_abstract_salts', \false);
