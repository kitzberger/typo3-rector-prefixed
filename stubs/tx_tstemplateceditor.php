<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_tstemplateceditor::class)) {
    return;
}
class tx_tstemplateceditor
{
}
\class_alias('tx_tstemplateceditor', 'tx_tstemplateceditor', \false);
