<?php

declare (strict_types=1);
namespace Rector\Testing\PHPUnit;

use Iterator;
use PHPStan\Analyser\NodeScopeResolver;
use Rector\Core\Application\FileProcessor;
use Rector\Core\Bootstrap\RectorConfigsResolver;
use Rector\Core\Configuration\Option;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Testing\Contract\CommunityRectorTestCaseInterface;
use Rector\Testing\Guard\FixtureGuard;
use Typo3RectorPrefix20210318\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210318\Symplify\EasyTesting\DataProvider\StaticFixtureUpdater;
use Typo3RectorPrefix20210318\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210318\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210318\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo;
abstract class AbstractCommunityRectorTestCase extends \Typo3RectorPrefix20210318\Symplify\PackageBuilder\Testing\AbstractKernelTestCase implements \Rector\Testing\Contract\CommunityRectorTestCaseInterface
{
    /**
     * @var FileProcessor
     */
    protected $fileProcessor;
    /**
     * @var ParameterProvider
     */
    protected $parameterProvider;
    /**
     * @var bool
     */
    private static $isInitialized = \false;
    /**
     * @var FixtureGuard
     */
    private static $fixtureGuard;
    /**
     * @var RectorConfigsResolver
     */
    private static $rectorConfigsResolver;
    protected function setUp() : void
    {
        $this->initializeDependencies();
        $smartFileInfo = new \Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo($this->provideConfigFilePath());
        $configFileInfos = self::$rectorConfigsResolver->resolveFromConfigFileInfo($smartFileInfo);
        $this->bootKernelWithConfigs(\Rector\Core\HttpKernel\RectorKernel::class, $configFileInfos);
        $this->fileProcessor = $this->getService(\Rector\Core\Application\FileProcessor::class);
        $this->parameterProvider = $this->getService(\Typo3RectorPrefix20210318\Symplify\PackageBuilder\Parameter\ParameterProvider::class);
    }
    protected function doTestFileInfo(\Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo, bool $shouldAutoload = \true) : void
    {
        self::$fixtureGuard->ensureFileInfoHasDifferentBeforeAndAfterContent($fixtureFileInfo);
        $inputFileInfoAndExpectedFileInfo = \Typo3RectorPrefix20210318\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpectedFileInfos($fixtureFileInfo, $shouldAutoload);
        $inputFileInfo = $inputFileInfoAndExpectedFileInfo->getInputFileInfo();
        // needed for PHPStan, because the analyzed file is just create in /temp
        /** @var NodeScopeResolver $nodeScopeResolver */
        $nodeScopeResolver = $this->getService(\PHPStan\Analyser\NodeScopeResolver::class);
        $nodeScopeResolver->setAnalysedFiles([$inputFileInfo->getRealPath()]);
        $expectedFileInfo = $inputFileInfoAndExpectedFileInfo->getExpectedFileInfo();
        $this->doTestFileMatchesExpectedContent($inputFileInfo, $expectedFileInfo, $fixtureFileInfo);
    }
    protected function yieldFilesFromDirectory(string $directory, string $suffix = '*.php.inc') : \Iterator
    {
        return \Typo3RectorPrefix20210318\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectory($directory, $suffix);
    }
    private function doTestFileMatchesExpectedContent(\Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, \Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo $expectedFileInfo, \Typo3RectorPrefix20210318\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $this->parameterProvider->changeParameter(\Rector\Core\Configuration\Option::SOURCE, [$originalFileInfo->getRealPath()]);
        $this->fileProcessor->parseFileInfoToLocalCache($originalFileInfo);
        $this->fileProcessor->refactor($originalFileInfo);
        $this->fileProcessor->postFileRefactor($originalFileInfo);
        // mimic post-rectors
        $changedContent = $this->fileProcessor->printToString($originalFileInfo);
        $relativeFilePathFromCwd = $fixtureFileInfo->getRelativeFilePathFromCwd();
        if (\getenv('UPDATE_TESTS') || \getenv('UT')) {
            \Typo3RectorPrefix20210318\Symplify\EasyTesting\DataProvider\StaticFixtureUpdater::updateFixtureContent($originalFileInfo, $changedContent, $fixtureFileInfo);
        }
        $this->assertStringEqualsFile($expectedFileInfo->getRealPath(), $changedContent, $relativeFilePathFromCwd);
    }
    private function initializeDependencies() : void
    {
        if (self::$isInitialized) {
            return;
        }
        self::$fixtureGuard = new \Rector\Testing\Guard\FixtureGuard();
        self::$rectorConfigsResolver = new \Rector\Core\Bootstrap\RectorConfigsResolver();
        self::$isInitialized = \true;
    }
}
