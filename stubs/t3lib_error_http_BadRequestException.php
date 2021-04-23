<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_error_http_BadRequestException::class)) {
    return;
}
class t3lib_error_http_BadRequestException
{
}
\class_alias('t3lib_error_http_BadRequestException', 't3lib_error_http_BadRequestException', \false);
