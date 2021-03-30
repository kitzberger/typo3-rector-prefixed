<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210330\Symplify\EasyTesting\Tests\MissingSkipPrefixResolver;

use Typo3RectorPrefix20210330\Symplify\EasyTesting\Finder\FixtureFinder;
use Typo3RectorPrefix20210330\Symplify\EasyTesting\HttpKernel\EasyTestingKernel;
use Typo3RectorPrefix20210330\Symplify\EasyTesting\MissplacedSkipPrefixResolver;
use Typo3RectorPrefix20210330\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class MissingSkipPrefixResolverTest extends \Typo3RectorPrefix20210330\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var MissplacedSkipPrefixResolver
     */
    private $missplacedSkipPrefixResolver;
    /**
     * @var FixtureFinder
     */
    private $fixtureFinder;
    protected function setUp() : void
    {
        $this->bootKernel(\Typo3RectorPrefix20210330\Symplify\EasyTesting\HttpKernel\EasyTestingKernel::class);
        $this->missplacedSkipPrefixResolver = $this->getService(\Typo3RectorPrefix20210330\Symplify\EasyTesting\MissplacedSkipPrefixResolver::class);
        $this->fixtureFinder = $this->getService(\Typo3RectorPrefix20210330\Symplify\EasyTesting\Finder\FixtureFinder::class);
    }
    public function test() : void
    {
        $fileInfos = $this->fixtureFinder->find([__DIR__ . '/Fixture']);
        $invalidFileInfos = $this->missplacedSkipPrefixResolver->resolve($fileInfos);
        $this->assertCount(2, $invalidFileInfos);
    }
}
