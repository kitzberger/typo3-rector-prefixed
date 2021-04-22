<?php

namespace TYPO3\CMS\Fluid\Core\Parser;

if (\interface_exists(\TYPO3\CMS\Fluid\Core\Parser\InterceptorInterface::class)) {
    return;
}
interface InterceptorInterface
{
}
