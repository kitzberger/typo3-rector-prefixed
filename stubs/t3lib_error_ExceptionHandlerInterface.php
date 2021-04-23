<?php

namespace Typo3RectorPrefix20210423;

if (\interface_exists(\Typo3RectorPrefix20210423\t3lib_error_ExceptionHandlerInterface::class)) {
    return;
}
interface t3lib_error_ExceptionHandlerInterface
{
}
\class_alias('t3lib_error_ExceptionHandlerInterface', 't3lib_error_ExceptionHandlerInterface', \false);
