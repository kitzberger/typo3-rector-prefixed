<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210422;

if (\class_exists(\Typo3RectorPrefix20210422\SC_file_upload::class)) {
    return;
}
final class SC_file_upload
{
}
\class_alias('SC_file_upload', 'SC_file_upload', \false);
