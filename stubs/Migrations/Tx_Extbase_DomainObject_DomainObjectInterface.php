<?php

namespace Typo3RectorPrefix20210422;

if (\interface_exists(\Typo3RectorPrefix20210422\Tx_Extbase_DomainObject_DomainObjectInterface::class)) {
    return;
}
interface Tx_Extbase_DomainObject_DomainObjectInterface
{
}
\class_alias('Tx_Extbase_DomainObject_DomainObjectInterface', 'Tx_Extbase_DomainObject_DomainObjectInterface', \false);
