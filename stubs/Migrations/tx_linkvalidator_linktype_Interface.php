<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\tx_linkvalidator_linktype_Interface::class)) {
    return;
}
interface tx_linkvalidator_linktype_Interface
{
}
\class_alias('tx_linkvalidator_linktype_Interface', 'tx_linkvalidator_linktype_Interface', \false);
