<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\t3lib_l10n_exception_FileNotFound::class)) {
    return;
}
class t3lib_l10n_exception_FileNotFound
{
}
\class_alias('t3lib_l10n_exception_FileNotFound', 't3lib_l10n_exception_FileNotFound', \false);
