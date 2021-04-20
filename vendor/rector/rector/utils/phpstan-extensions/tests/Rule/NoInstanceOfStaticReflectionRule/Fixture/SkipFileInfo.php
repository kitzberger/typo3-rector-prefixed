<?php

declare (strict_types=1);
namespace Rector\PHPStanExtensions\Tests\Rule\NoInstanceOfStaticReflectionRule\Fixture;

use Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo;
final class SkipFileInfo
{
    public function check($object)
    {
        if ($object instanceof \Typo3RectorPrefix20210420\Symplify\SmartFileSystem\SmartFileInfo) {
            return \true;
        }
    }
}
