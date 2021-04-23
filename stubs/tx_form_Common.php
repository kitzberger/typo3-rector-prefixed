<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_form_Common::class)) {
    return;
}
class tx_form_Common
{
}
\class_alias('tx_form_Common', 'tx_form_Common', \false);
