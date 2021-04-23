<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\SC_file_upload::class)) {
    return;
}
class SC_file_upload
{
}
\class_alias('SC_file_upload', 'SC_file_upload', \false);
