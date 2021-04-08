<?php

declare (strict_types=1);
namespace Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\PropertyFetchTypeResolver;

use Iterator;
use Typo3RectorPrefix20210408\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo;
/**
 * @see \Rector\NodeTypeResolver\NodeTypeResolver\PropertyFetchTypeResolver
 */
final class Php74Test extends \Rector\NodeTypeResolver\Tests\PerNodeTypeResolver\PropertyFetchTypeResolver\AbstractPropertyFetchTypeResolverTest
{
    /**
     * @requires PHP 7.4
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210408\Symplify\SmartFileSystem\SmartFileInfo $smartFileInfo) : void
    {
        $this->doTestFileInfo($smartFileInfo);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210408\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectoryExclusively(__DIR__ . '/FixturePhp74');
    }
}
