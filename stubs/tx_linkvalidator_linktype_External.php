<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\tx_linkvalidator_linktype_External::class)) {
    return;
}
class tx_linkvalidator_linktype_External
{
}
\class_alias('tx_linkvalidator_linktype_External', 'tx_linkvalidator_linktype_External', \false);
