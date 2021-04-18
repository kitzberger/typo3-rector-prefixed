<?php

declare (strict_types=1);
namespace Rector\Testing\PHPUnit;

use Iterator;
use Typo3RectorPrefix20210418\Nette\Utils\Strings;
use PHPStan\Analyser\NodeScopeResolver;
use Typo3RectorPrefix20210418\PHPUnit\Framework\ExpectationFailedException;
use Psr\Container\ContainerInterface;
use Rector\Core\Application\ApplicationFileProcessor;
use Rector\Core\Application\FileSystem\RemovedAndAddedFilesCollector;
use Rector\Core\Bootstrap\RectorConfigsResolver;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\HttpKernel\RectorKernel;
use Rector\Core\ValueObject\Application\File;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
use Rector\Testing\Contract\RectorTestInterface;
use Rector\Testing\PHPUnit\Behavior\MovingFilesTrait;
use Typo3RectorPrefix20210418\Symplify\EasyTesting\DataProvider\StaticFixtureFinder;
use Typo3RectorPrefix20210418\Symplify\EasyTesting\DataProvider\StaticFixtureUpdater;
use Typo3RectorPrefix20210418\Symplify\EasyTesting\StaticFixtureSplitter;
use Typo3RectorPrefix20210418\Symplify\PackageBuilder\Parameter\ParameterProvider;
use Typo3RectorPrefix20210418\Symplify\PackageBuilder\Testing\AbstractKernelTestCase;
use Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo;
abstract class AbstractRectorTestCase extends \Typo3RectorPrefix20210418\Symplify\PackageBuilder\Testing\AbstractKernelTestCase implements \Rector\Testing\Contract\RectorTestInterface
{
    use MovingFilesTrait;
    /**
     * @var ParameterProvider
     */
    protected $parameterProvider;
    /**
     * @var RemovedAndAddedFilesCollector
     */
    protected $removedAndAddedFilesCollector;
    /**
     * @var SmartFileInfo
     */
    protected $originalTempFileInfo;
    /**
     * @var ContainerInterface|null
     */
    protected static $allRectorContainer;
    /**
     * @var DynamicSourceLocatorProvider
     */
    private $dynamicSourceLocatorProvider;
    /**
     * @var ApplicationFileProcessor
     */
    private $applicationFileProcessor;
    protected function setUp() : void
    {
        // speed up
        @\ini_set('memory_limit', '-1');
        $configFileInfo = new \Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo($this->provideConfigFilePath());
        $rectorConfigsResolver = new \Rector\Core\Bootstrap\RectorConfigsResolver();
        $configFileInfos = $rectorConfigsResolver->resolveFromConfigFileInfo($configFileInfo);
        $this->bootKernelWithConfigsAndStaticCache(\Rector\Core\HttpKernel\RectorKernel::class, $configFileInfos);
        $this->applicationFileProcessor = $this->getService(\Rector\Core\Application\ApplicationFileProcessor::class);
        $this->parameterProvider = $this->getService(\Typo3RectorPrefix20210418\Symplify\PackageBuilder\Parameter\ParameterProvider::class);
        $this->dynamicSourceLocatorProvider = $this->getService(\Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider::class);
        $this->removedAndAddedFilesCollector = $this->getService(\Rector\Core\Application\FileSystem\RemovedAndAddedFilesCollector::class);
        $this->removedAndAddedFilesCollector->reset();
        /** @var Configuration $configuration */
        $configuration = $this->getService(\Rector\Core\Configuration\Configuration::class);
        $configuration->setIsDryRun(\true);
    }
    public function provideConfigFilePath() : string
    {
        // must be implemented
        return '';
    }
    /**
     * @return Iterator<SmartFileInfo>
     */
    protected function yieldFilesFromDirectory(string $directory, string $suffix = '*.php.inc') : \Iterator
    {
        return \Typo3RectorPrefix20210418\Symplify\EasyTesting\DataProvider\StaticFixtureFinder::yieldDirectoryExclusively($directory, $suffix);
    }
    protected function doTestFileInfo(\Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $inputFileInfoAndExpectedFileInfo = \Typo3RectorPrefix20210418\Symplify\EasyTesting\StaticFixtureSplitter::splitFileInfoToLocalInputAndExpectedFileInfos($fixtureFileInfo);
        $inputFileInfo = $inputFileInfoAndExpectedFileInfo->getInputFileInfo();
        $this->originalTempFileInfo = $inputFileInfo;
        $expectedFileInfo = $inputFileInfoAndExpectedFileInfo->getExpectedFileInfo();
        $this->doTestFileMatchesExpectedContent($inputFileInfo, $expectedFileInfo, $fixtureFileInfo);
    }
    protected function getFixtureTempDirectory() : string
    {
        return \sys_get_temp_dir() . '/_temp_fixture_easy_testing';
    }
    private function doTestFileMatchesExpectedContent(\Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $originalFileInfo, \Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $expectedFileInfo, \Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $fixtureFileInfo) : void
    {
        $this->parameterProvider->changeParameter(\Rector\Core\Configuration\Option::SOURCE, [$originalFileInfo->getRealPath()]);
        $changedContent = $this->processFileInfo($originalFileInfo);
        // file is removed, we cannot compare it
        if ($this->removedAndAddedFilesCollector->isFileRemoved($originalFileInfo)) {
            return;
        }
        $relativeFilePathFromCwd = $fixtureFileInfo->getRelativeFilePathFromCwd();
        try {
            $this->assertStringEqualsFile($expectedFileInfo->getRealPath(), $changedContent, $relativeFilePathFromCwd);
        } catch (\Typo3RectorPrefix20210418\PHPUnit\Framework\ExpectationFailedException $expectationFailedException) {
            \Typo3RectorPrefix20210418\Symplify\EasyTesting\DataProvider\StaticFixtureUpdater::updateFixtureContent($originalFileInfo, $changedContent, $fixtureFileInfo);
            $contents = $expectedFileInfo->getContents();
            // make sure we don't get a diff in which every line is different (because of differences in EOL)
            $contents = $this->normalizeNewlines($contents);
            // if not exact match, check the regex version (useful for generated hashes/uuids in the code)
            $this->assertStringMatchesFormat($contents, $changedContent, $relativeFilePathFromCwd);
        }
    }
    private function normalizeNewlines(string $string) : string
    {
        return \Typo3RectorPrefix20210418\Nette\Utils\Strings::replace($string, '#\\r\\n|\\r|\\n#', "\n");
    }
    private function processFileInfo(\Typo3RectorPrefix20210418\Symplify\SmartFileSystem\SmartFileInfo $fileInfo) : string
    {
        $this->dynamicSourceLocatorProvider->setFileInfo($fileInfo);
        // needed for PHPStan, because the analyzed file is just created in /temp - need for trait and similar deps
        /** @var NodeScopeResolver $nodeScopeResolver */
        $nodeScopeResolver = $this->getService(\PHPStan\Analyser\NodeScopeResolver::class);
        $nodeScopeResolver->setAnalysedFiles([$fileInfo->getRealPath()]);
        $file = new \Rector\Core\ValueObject\Application\File($fileInfo, $fileInfo->getContents());
        $this->applicationFileProcessor->run([$file]);
        return $file->getFileContent();
    }
}
