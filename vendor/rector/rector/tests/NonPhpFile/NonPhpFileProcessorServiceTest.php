<?php

declare (strict_types=1);
namespace Rector\Core\Tests\NonPhpFile;

use Rector\ChangesReporting\Application\ErrorAndDiffCollector;
use Rector\Core\Configuration\Configuration;
use Rector\Core\Configuration\Option;
use Rector\Core\NonPhpFile\NonPhpFileProcessorService;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
final class NonPhpFileProcessorServiceTest extends \Rector\Testing\PHPUnit\AbstractRectorTestCase
{
    /**
     * @var NonPhpFileProcessorService
     */
    private $nonPhpFileProcessorService;
    /**
     * @var ErrorAndDiffCollector
     */
    private $errorAndDiffCollector;
    protected function setUp() : void
    {
        parent::setUp();
        /** @var Configuration $configuration */
        $configuration = $this->getService(\Rector\Core\Configuration\Configuration::class);
        $configuration->setIsDryRun(\true);
        $this->nonPhpFileProcessorService = $this->getService(\Rector\Core\NonPhpFile\NonPhpFileProcessorService::class);
        $this->errorAndDiffCollector = $this->getService(\Rector\ChangesReporting\Application\ErrorAndDiffCollector::class);
    }
    public function test() : void
    {
        $this->nonPhpFileProcessorService->runOnPaths($this->parameterProvider->provideParameter(\Rector\Core\Configuration\Option::PATHS));
        $fileDiffs = $this->errorAndDiffCollector->getFileDiffs();
        $this->assertCount(1, $fileDiffs);
    }
    public function provideConfigFilePath() : string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
