<?php

declare (strict_types=1);
namespace TYPO3\CMS\Core\Cache\Frontend;

if (\interface_exists(\TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class)) {
    return;
}
final class VariableFrontend
{
}
