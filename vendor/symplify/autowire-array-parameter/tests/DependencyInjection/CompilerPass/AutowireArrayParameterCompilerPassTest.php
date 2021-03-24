<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\DependencyInjection\CompilerPass;

use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\HttpKernel\AutowireArrayParameterHttpKernel;
use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\ArrayShapeCollector;
use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\FirstCollectedInterface;
use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\SecondCollectedInterface;
use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\IterableCollector;
use Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\SomeCollector;
use Typo3RectorPrefix20210324\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
final class AutowireArrayParameterCompilerPassTest extends \Typo3RectorPrefix20210324\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    protected function setUp() : void
    {
        $this->bootKernel(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\HttpKernel\AutowireArrayParameterHttpKernel::class);
    }
    public function test() : void
    {
        /** @var SomeCollector $someCollector */
        $someCollector = $this->getService(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\SomeCollector::class);
        $this->assertCount(2, $someCollector->getFirstCollected());
        $this->assertCount(2, $someCollector->getSecondCollected());
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\FirstCollectedInterface::class, $someCollector->getFirstCollected()[0]);
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\SecondCollectedInterface::class, $someCollector->getSecondCollected()[0]);
    }
    public function testArrayShape() : void
    {
        $arrayShapeCollector = $this->getService(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\ArrayShapeCollector::class);
        $this->assertCount(2, $arrayShapeCollector->getFirstCollected());
        $this->assertCount(2, $arrayShapeCollector->getSecondCollected());
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\FirstCollectedInterface::class, $arrayShapeCollector->getFirstCollected()[0]);
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\SecondCollectedInterface::class, $arrayShapeCollector->getSecondCollected()[0]);
    }
    public function testIterable() : void
    {
        $iterableCollector = $this->getService(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\IterableCollector::class);
        $this->assertCount(2, $iterableCollector->getFirstCollected());
        $this->assertCount(2, $iterableCollector->getSecondCollected());
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\FirstCollectedInterface::class, $iterableCollector->getFirstCollected()[0]);
        $this->assertInstanceOf(\Typo3RectorPrefix20210324\Symplify\AutowireArrayParameter\Tests\Source\Contract\SecondCollectedInterface::class, $iterableCollector->getSecondCollected()[0]);
    }
}
