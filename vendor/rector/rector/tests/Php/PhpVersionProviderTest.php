<?php

declare (strict_types=1);
namespace Rector\Core\Tests\Php;

use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\Php\PhpVersionProvider;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class PhpVersionProviderTest extends \Typo3RectorPrefix20210329\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var PhpVersionProvider
     */
    private $phpVersionProvider;
    protected function setUp() : void
    {
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->phpVersionProvider = $this->getService(\Rector\Core\Php\PhpVersionProvider::class);
    }
    public function test() : void
    {
        $phpVersion = $this->phpVersionProvider->provide();
        $this->assertSame(100000, $phpVersion);
    }
}
