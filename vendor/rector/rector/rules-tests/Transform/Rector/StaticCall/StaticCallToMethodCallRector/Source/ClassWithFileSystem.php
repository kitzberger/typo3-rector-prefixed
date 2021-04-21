<?php

declare (strict_types=1);
namespace Rector\Tests\Transform\Rector\StaticCall\StaticCallToMethodCallRector\Source;

use Typo3RectorPrefix20210421\Symplify\SmartFileSystem\SmartFileSystem;
abstract class ClassWithFileSystem
{
    /**
     * @var SmartFileSystem
     */
    public $smartFileSystemProperty;
}
