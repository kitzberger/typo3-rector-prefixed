<?php

namespace TYPO3\CMS\Saltedpasswords\Salt;

if (\interface_exists(\TYPO3\CMS\Saltedpasswords\Salt\ComposedSaltInterface::class)) {
    return;
}
interface ComposedSaltInterface
{
}
