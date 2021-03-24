<?php

declare (strict_types=1);
namespace Ssch\TYPO3Rector\Helper;

use Typo3RectorPrefix20210324\Nette\Utils\Strings;
use Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo;
trait FileHelperTrait
{
    private function isExtLocalConf(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : bool
    {
        return \Typo3RectorPrefix20210324\Nette\Utils\Strings::endsWith($fileInfo->getFilename(), 'ext_localconf.php');
    }
    private function isExtTables(\Typo3RectorPrefix20210324\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : bool
    {
        return \Typo3RectorPrefix20210324\Nette\Utils\Strings::endsWith($fileInfo->getFilename(), 'ext_tables.php');
    }
}
