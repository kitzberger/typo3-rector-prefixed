<?php

declare (strict_types=1);
namespace Rector\Tests\Naming\ValueObjectFactory\PropertyRenameFactory;

use Iterator;
use PhpParser\Node\Stmt\Property;
use Rector\Core\Exception\ShouldNotHappenException;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\FileSystemRector\Parser\FileInfoParser;
use Rector\Naming\ExpectedNameResolver\MatchPropertyTypeExpectedNameResolver;
use Rector\Naming\ValueObject\PropertyRename;
use Rector\Naming\ValueObjectFactory\PropertyRenameFactory;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class PropertyRenameFactoryTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var PropertyRenameFactory
     */
    private $propertyRenameFactory;
    /**
     * @var FileInfoParser
     */
    private $fileInfoParser;
    /**
     * @var BetterNodeFinder
     */
    private $betterNodeFinder;
    /**
     * @var MatchPropertyTypeExpectedNameResolver
     */
    private $matchPropertyTypeExpectedNameResolver;
    protected function setUp() : void
    {
        $this->boot();
        $this->propertyRenameFactory = $this->getService(\Rector\Naming\ValueObjectFactory\PropertyRenameFactory::class);
        $this->matchPropertyTypeExpectedNameResolver = $this->getService(\Rector\Naming\ExpectedNameResolver\MatchPropertyTypeExpectedNameResolver::class);
        $this->fileInfoParser = $this->getService(\Rector\FileSystemRector\Parser\FileInfoParser::class);
        $this->betterNodeFinder = $this->getService(\Rector\Core\PhpParser\Node\BetterNodeFinder::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $fileInfoWithProperty, string $expectedName, string $currentName) : void
    {
        $property = $this->getPropertyFromFileInfo($fileInfoWithProperty);
        $expectedPropertyName = $this->matchPropertyTypeExpectedNameResolver->resolve($property);
        if ($expectedPropertyName === null) {
            return;
        }
        $actualPropertyRename = $this->propertyRenameFactory->createFromExpectedName($property, $expectedPropertyName);
        $this->assertNotNull($actualPropertyRename);
        /** @var PropertyRename $actualPropertyRename */
        $this->assertSame($property, $actualPropertyRename->getProperty());
        $this->assertSame($expectedName, $actualPropertyRename->getExpectedName());
        $this->assertSame($currentName, $actualPropertyRename->getCurrentName());
    }
    /**
     * @return Iterator<string[]|SmartFileInfo[]>
     */
    public function provideData() : \Iterator
    {
        (yield [new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/skip_some_class.php.inc'), 'eliteManager', 'eventManager']);
    }
    private function getPropertyFromFileInfo(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : \PhpParser\Node\Stmt\Property
    {
        $nodes = $this->fileInfoParser->parseFileInfoToNodesAndDecorate($fileInfo);
        $property = $this->betterNodeFinder->findFirstInstanceOf($nodes, \PhpParser\Node\Stmt\Property::class);
        if (!$property instanceof \PhpParser\Node\Stmt\Property) {
            throw new \Rector\Core\Exception\ShouldNotHappenException();
        }
        return $property;
    }
}
