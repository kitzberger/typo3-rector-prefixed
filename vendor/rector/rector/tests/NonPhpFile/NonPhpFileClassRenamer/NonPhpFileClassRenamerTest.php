<?php

declare (strict_types=1);
namespace Rector\Core\Tests\NonPhpFile\NonPhpFileClassRenamer;

use Iterator;
use Rector\Core\Configuration\Option;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\NonPhpFile\NonPhpFileClassRenamer;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClass;
use Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClass;
use Typo3RectorPrefix20210407\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210407\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210407\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210407\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo;
final class NonPhpFileClassRenamerTest extends \Typo3RectorPrefix20210407\Symplify\PackageBuilder\Testing\AbstractKernelTestCase
{
    /**
     * @var array<string, string>
     */
    private const CLASS_RENAMES = [
        'Session' => 'Typo3RectorPrefix20210407\\Illuminate\\Support\\Facades\\Session',
        \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\OldClass::class => \Rector\Renaming\Tests\Rector\Name\RenameClassRector\Source\NewClass::class,
        // Laravel
        'Form' => 'Typo3RectorPrefix20210407\\Collective\\Html\\FormFacade',
        'Html' => 'Typo3RectorPrefix20210407\\Collective\\Html\\HtmlFacade',
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
        $this->bootKernel(\Rector\Core\HttpKernel\RectorKernel::class);
        $this->nonPhpFileClassRenamer = $this->getService(\Rector\Core\NonPhpFile\NonPhpFileClassRenamer::class);
        $this->parameterProvider = $this->getService(\Typo3RectorPrefix20210407\Symplify\PackageBuilder\Parameter\ParameterProvider::class);
    }
    /**
     * @dataProvider provideData()
     */
    public function test(\Typo3RectorPrefix20210407\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $this->parameterProvider->changeParameter(\Rector\Core\Configuration\Option::AUTO_IMPORT_NAMES, \false);
        $inputAndExpected = \Typo3RectorPrefix20210407\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToInputAndExpected($fixtureFileInfo);
        $changedContent = $this->nonPhpFileClassRenamer->renameClasses($inputAndExpected->getInput(), self::CLASS_RENAMES);
        $this->assertSame($inputAndExpected->getExpected(), $changedContent);
    }
    public function provideData() : \Iterator
    {
        return \Typo3RectorPrefix20210407\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory(__DIR__ . '/Fixture', '*');
    }
}
