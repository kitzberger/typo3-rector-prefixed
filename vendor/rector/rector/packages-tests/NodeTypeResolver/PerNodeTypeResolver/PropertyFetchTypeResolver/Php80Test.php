<?php

declare (strict_types=1);
namespace Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver;

use Iterator;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Rector\NodeTypeResolver\NodeTypeResolver\PropertyFetchTypeResolver
 */
final class Php80Test extends \Rector\Tests\NodeTypeResolver\PerNodeTypeResolver\PropertyFetchTypeResolver\AbstractPropertyFetchTypeResolverTest
{
    /**
     * @requires PHP 8.0
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->doTestFileInfo($smartFileInfo);
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectoryExclusively(__DIR__ . '/FixturePhp80');
    }
}
