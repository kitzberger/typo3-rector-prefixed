<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\t3lib_error_ErrorHandlerInterface::class)) {
    return;
}
interface t3lib_error_ErrorHandlerInterface
{
}
\class_alias('t3lib_error_ErrorHandlerInterface', 't3lib_error_ErrorHandlerInterface', \false);
