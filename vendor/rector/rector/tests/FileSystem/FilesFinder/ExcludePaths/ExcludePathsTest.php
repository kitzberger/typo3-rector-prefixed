<?php

declare (strict_types=1);
namespace Rector\Core\Tests\FileSystem\FilesFinder\ExcludePaths;

use Rector\Core\FileSystem\FilesFinder;
use Rector\Core\HttpKernel\RectorKernel;
use Typo3RectorPrefix20210413\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class ExcludePathsTest extends \Typo3RectorPrefix20210413\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    public function testShouldFail() : void
    {
        $this->bootKernelWithConfigs(\Rector\Core\HttpKernel\RectorKernel::class, [__DIR__ . '/config/config-with-excluded-paths.php']);
        $filesFinder = $this->getService(\Rector\Core\FileSystem\FilesFinder::class);
        $foundFileInfos = $filesFinder->findInDirectoriesAndFiles([__DIR__ . '/Source'], ['php']);
        $this->assertCount(1, $foundFileInfos);
    }
}
