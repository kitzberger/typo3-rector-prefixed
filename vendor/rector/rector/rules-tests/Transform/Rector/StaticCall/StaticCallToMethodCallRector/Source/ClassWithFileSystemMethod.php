<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\StaticCall\StaticCallToMethodCallRector\Source;

use Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem;
abstract class ClassWithFileSystemMethod
{
    public function getSmartFileSystem() : \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem
    {
        return new \Typo3RectorPrefix20210410\Symplify\SmartFileSystem\SmartFileSystem();
    }
}
