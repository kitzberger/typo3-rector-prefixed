<?php

declare (strict_types=1);
namespace Rector\Transform\Tests\Rector\StaticCall\StaticCallToMethodCallRector\Source;

use Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem;
abstract class ClassWithFileSystemMethod
{
    public function getSmartFileSystem() : \Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem
    {
        return new \Typo3RectorPrefix20210331\Symplify\SmartFileSystem\SmartFileSystem();
    }
}
