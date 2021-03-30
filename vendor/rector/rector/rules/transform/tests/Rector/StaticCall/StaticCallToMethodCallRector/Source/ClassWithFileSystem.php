<?php

declare (strict_types=1);
namespace Rector\Transform\Tests\Rector\StaticCall\StaticCallToMethodCallRector\Source;

use Typo3RectorPrefix20210330\Symplify\SmartFileSystem\SmartFileSystem;
abstract class ClassWithFileSystem
{
    /**
     * @var SmartFileSystem
     */
    public $smartFileSystemProperty;
}
