<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Tests\ConfigResolver;

use Iterator;
use Typo3RectorPrefix20210317\PHPUnit\Framework\TestCase;
use Typo3RectorPrefix20210317\Symfony\Component\Console\Input\ArrayInput;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Exception\SetNotFoundException;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\SetAwareConfigResolver;
use Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Tests\ConfigResolver\Source\DummySetProvider;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\Exception\FileNotFoundException;
use Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo;
final class SetAwareConfigResolverTest extends \Typo3RectorPrefix20210317\PHPUnit\Framework\TestCase
{
    /**
     * @var SetAwareConfigResolver
     */
    private $setAwareConfigResolver;
    protected function setUp() : void
    {
        $this->setAwareConfigResolver = new \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\SetAwareConfigResolver(new \Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Tests\ConfigResolver\Source\DummySetProvider());
    }
    /**
     * @dataProvider provideOptionsAndExpectedConfig()
     * @param mixed[] $options
     */
    public function testDetectFromInputAndProvideWithAbsolutePath(array $options, string $expectedConfig) : void
    {
        $resolvedConfigFileInfo = $this->setAwareConfigResolver->resolveFromInput(new \Typo3RectorPrefix20210317\Symfony\Component\Console\Input\ArrayInput($options));
        $this->assertSame($expectedConfig, $resolvedConfigFileInfo->getRealPath());
    }
    public function provideOptionsAndExpectedConfig() : \Iterator
    {
        (yield [['--config' => 'README.md'], \getcwd() . '/README.md']);
        (yield [['-c' => 'README.md'], \getcwd() . '/README.md']);
        (yield [['--config' => \getcwd() . '/README.md'], \getcwd() . '/README.md']);
        (yield [['-c' => \getcwd() . '/README.md'], \getcwd() . '/README.md']);
    }
    /**
     * @dataProvider provideDataForEmptyConfig()
     * @param mixed[] $options
     */
    public function testDetectFromInputAndProvideWithEmptyConfig(array $options) : void
    {
        $resolvedConfigFileInfo = $this->setAwareConfigResolver->resolveFromInput(new \Typo3RectorPrefix20210317\Symfony\Component\Console\Input\ArrayInput($options));
        $this->assertNull($resolvedConfigFileInfo);
    }
    /**
     * @return Iterator<array<int, array<int|string, string>>|null[]>
     */
    public function provideDataForEmptyConfig() : \Iterator
    {
        (yield [['--', 'sh', '-c' => '/bin/true'], null]);
    }
    public function testSetsNotFound() : void
    {
        $this->expectException(\Typo3RectorPrefix20210317\Symplify\SetConfigResolver\Exception\SetNotFoundException::class);
        $basicConfigFileInfo = new \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/missing_set_config.php');
        $this->setAwareConfigResolver->resolveFromParameterSetsFromConfigFiles([$basicConfigFileInfo]);
    }
    public function testPhpSetsFileInfos() : void
    {
        $basicConfigFileInfo = new \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Fixture/php_config_with_sets.php');
        $setFileInfos = $this->setAwareConfigResolver->resolveFromParameterSetsFromConfigFiles([$basicConfigFileInfo]);
        $this->assertCount(1, $setFileInfos);
        $setFileInfo = $setFileInfos[0];
        $expectedSetFileInfo = new \Typo3RectorPrefix20210317\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/Source/some_php_set.php');
        $this->assertEquals($expectedSetFileInfo, $setFileInfo);
    }
    public function testMissingFileInInput() : void
    {
        $this->expectException(\Typo3RectorPrefix20210317\Symplify\SmartFileSystem\Exception\FileNotFoundException::class);
        $arrayInput = new \Typo3RectorPrefix20210317\Symfony\Component\Console\Input\ArrayInput(['--config' => 'someFile.yml']);
        $this->setAwareConfigResolver->resolveFromInput($arrayInput);
    }
}
