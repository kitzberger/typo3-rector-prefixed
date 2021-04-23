<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423;

if (\class_exists(\Typo3RectorPrefix20210423\Typo3_ModuleStorage::class)) {
    return;
}
class Typo3_ModuleStorage
{
}
\class_alias('Typo3_ModuleStorage', 'Typo3_ModuleStorage', \false);
