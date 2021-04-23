<?php

declare (strict_types=1);
namespace Rector\Core\Tests\Application\ApplicationFileProcessor;

use Rector\Core\Application\ApplicationFileProcessor;
use Rector\Core\Configuration\Configuration;
use Rector\Core\ValueObjectFactory\Application\FileFactory;
use Rector\Core\ValueObjectFactory\ProcessResultFactory;
use Rector\Testing\PHPUnit\AbstractTestCase;
use Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo;
final class ApplicationFileProcessorTest extends \Rector\Testing\PHPUnit\AbstractTestCase
{
    /**
     * @var ApplicationFileProcessor
     */
    private $applicationFileProcessor;
    /**
     * @var FileFactory
     */
    private $fileFactory;
    /**
     * @var ProcessResultFactory
     */
    private $processResultFactory;
    protected function setUp() : void
    {
        $this->bootFromConfigFileInfos([new \Typo3RectorPrefix20210423\Symplify\SmartFileSystem\SmartFileInfo(__DIR__ . '/config/configured_rule.php')]);
        /** @var Configuration $configuration */
        $configuration = $this->getService(\Rector\Core\Configuration\Configuration::class);
        $configuration->setIsDryRun(\true);
        $this->applicationFileProcessor = $this->getService(\Rector\Core\Application\ApplicationFileProcessor::class);
        $this->fileFactory = $this->getService(\Rector\Core\ValueObjectFactory\Application\FileFactory::class);
        $this->processResultFactory = $this->getService(\Rector\Core\ValueObjectFactory\ProcessResultFactory::class);
    }
    public function test() : void
    {
        $files = $this->fileFactory->createFromPaths([__DIR__ . '/Fixture']);
        $this->assertCount(2, $files);
        $this->applicationFileProcessor->run($files);
        $processResult = $this->processResultFactory->create($files);
        $this->assertCount(1, $processResult->getFileDiffs());
    }
}
