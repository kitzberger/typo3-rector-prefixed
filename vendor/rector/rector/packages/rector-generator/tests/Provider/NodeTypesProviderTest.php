<?php

declare (strict_types=1);
namespace Rector\RectorGenerator\Tests\Provider;

use Rector\Core\HttpKernel\RectorKernel;
use Rector\RectorGenerator\Provider\NodeTypesProvider;
use Typo3RectorPrefix20210317\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class NodeTypesProviderTest extends \Typo3RectorPrefix20210317\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var NodeTypesProvider
     */
    private $nodeTypesProvider;
    protected function setUp() : void
    {
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->nodeTypesProvider = $this->getService(\Rector\RectorGenerator\Provider\NodeTypesProvider::class);
    }
    public function test() : void
    {
        $nodeTypes = $this->nodeTypesProvider->provide();
        $nodeTypeCount = \count($nodeTypes);
        $this->assertGreaterThan(70, $nodeTypeCount);
        $this->assertContains('Typo3RectorPrefix20210317\\Expr\\New_', $nodeTypes);
        $this->assertContains('Param', $nodeTypes);
    }
}
