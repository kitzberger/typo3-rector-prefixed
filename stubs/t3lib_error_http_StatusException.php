<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_error_http_StatusException::class)) {
    return;
}
class t3lib_error_http_StatusException
{
}
\class_alias('t3lib_error_http_StatusException', 't3lib_error_http_StatusException', \false);
