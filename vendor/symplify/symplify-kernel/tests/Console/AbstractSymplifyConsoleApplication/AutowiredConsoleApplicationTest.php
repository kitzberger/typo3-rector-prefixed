<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Tests\Console\AbstractSymplifyConsoleApplication;

use Typo3RectorPrefix20210329\Symfony\Component\Console\Application;
use Typo3RectorPrefix20210329\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Tests\HttpKernel\OnlyForTestsKernel;
final class AutowiredConsoleApplicationTest extends \Typo3RectorPrefix20210329\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    protected function setUp() : void
    {
        $this->bootKernel(\Typo3RectorPrefix20210329\Symplify\SymplifyKernel\Tests\HttpKernel\OnlyForTestsKernel::class);
    }
    public function test() : void
    {
        $application = $this->getService(\Typo3RectorPrefix20210329\Symfony\Component\Console\Application::class);
        $this->assertInstanceOf(\Typo3RectorPrefix20210329\Symfony\Component\Console\Application::class, $application);
    }
}
