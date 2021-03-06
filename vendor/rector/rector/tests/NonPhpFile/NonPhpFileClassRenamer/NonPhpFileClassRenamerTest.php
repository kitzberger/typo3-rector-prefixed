<?php

declare (strict_types=1);
namespace Rector\Core\Tests\NonPhpFile\NonPhpFileClassRenamer;

use Iterator;
use Rector\Core\Configuration\Option;
use Rector\Core\NonPhpFile\NonPhpFileClassRenamer;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210423\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210423\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class NonPhpFileClassRenamerTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var array<string, class-string>
     */
    private const CLASS_RENAMES = [
        'Session' => 'Illuminate\\Support\\Facades\\Session',
        \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\OldClass::class => \Rector\Tests\Renaming\Rector\Name\RenameClassRector\Source\NewClass::class,
        // Laravel
        'Form' => 'Collective\\Html\\FormFacade',
        'Html' => 'Collective\\Html\\HtmlFacade',
    ];
    /**
     * @var NonPhpFileClassRenamer
     */
    private $nonPhpFileClassRenamer;
    /**
     * @var ParameterProvider
     */
    private $parameterProvider;
    protected function setUp() : void
    {
        $this->boot();
        $this->nonPhpFileClassRenamer = $this->getService(\Rector\Core\NonPhpFile\NonPhpFileClassRenamer::class);
        $this->parameterProvider = $this->getService(\Typo3RectorPrefix20210423\Symplify\PackageBuilder\Parameter\ParameterProvider::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $this->parameterProvider->changeParameter(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \false);
        $inputAndExpected = \Typo3RectorPrefix20210423\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToInputAndExpected($fixtureFileInfo);
        $changedContent = $this->nonPhpFileClassRenamer->renameClasses($inputAndExpected->getInput(), self::CLASS_RENAMES);
        $this->assertSame($inputAndExpected->getExpected(), $changedContent);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210423\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture', '*');
    }
}
