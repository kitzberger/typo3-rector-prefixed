<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210423\Symplify\Skipper\Tests\SkipCriteriaResolver\SkippedPathsResolver;

use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel;
use Typo3RectorPrefix20210423\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver;
final class SkippedPathsResolverTest extends \Typo3RectorPrefix20210423\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var SkippedPathsResolver
     */
    private $skippedPathsResolver;
    protected function setUp() : void
    {
        $this->bootKernelWithConfigs(\Typo3RectorPrefix20210423\Symplify\Skipper\HttpKernel\SkipperKernel::class, [__DIR__ . '/config/config.php']);
        $this->skippedPathsResolver = $this->getService(\Typo3RectorPrefix20210423\Symplify\Skipper\SkipCriteriaResolver\SkippedPathsResolver::class);
    }
    public function test() : void
    {
        $skippedPaths = $this->skippedPathsResolver->resolve();
        $this->assertCount(2, $skippedPaths);
        $this->assertSame('*/Mask/*', $skippedPaths[1]);
    }
}
